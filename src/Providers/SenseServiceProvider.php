<?php

/*
 * This file is part of Laravel Sense.
 *
 * (c) Anton Komarev <a.komarev@cybercog.su>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Cog\Laravel\Sense\Providers;

use Cog\Laravel\Sense\Request\Id;
use Cog\Laravel\Sense\RequestSummary\Models\RequestSummary;
use Cog\Laravel\Sense\Statement\Models\Statement;
use Cog\Laravel\Sense\StatementSummary\Models\StatementSummary;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class SenseServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerDbConnection();
        $this->registerRoutes();
        $this->registerResources();
        $this->registerSensors();
    }

    public function register(): void
    {
        $this->configure();
        $this->offerPublishing();
    }

    // TODO: Remove this hacky solution
    protected function registerDbConnection(): void
    {
        if (is_null($config = config('database.connections.sense'))) {
            $defaultConnection = config('database.default');
            if (is_null($fallbackConfig = config("database.connections.{$defaultConnection}"))) {
                throw new \Exception('Database connection [sense] has not been configured.');
            }
            config(['database.connections.sense' => $fallbackConfig]);
        }
    }

    /**
     * Register the Sense routes.
     *
     * @return void
     */
    protected function registerRoutes(): void
    {
        Route::group([
            'prefix' => config('sense.uri', 'sense'),
            'namespace' => 'Cog\Laravel\Sense\Http\Controllers',
            'middleware' => config('sense.middleware', 'web'),
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        });
    }

    /**
     * Register the Sense resources.
     *
     * @return void
     */
    protected function registerResources(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'sense');
    }

    /**
     * Setup the configuration for Sense.
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/sense.php', 'sense'
        );
    }

    /**
     * Setup the resource publishing groups for Sense.
     *
     * @return void
     */
    protected function offerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $migrationsPath = __DIR__ . '/../../database/migrations';

            $this->publishes([
                $migrationsPath => database_path('migrations'),
            ], 'migrations');

            $this->publishes([
                __DIR__ . '/../../config/sense.php' => config_path('sense.php'),
            ], 'sense-config');

            $this->loadMigrationsFrom($migrationsPath);
        }
    }

    private function registerSensors(): void
    {
        if ($this->isSenseDisabled()) {
            return;
        }

        $requestId = Id::make();
        /** @var \Cog\Laravel\Sense\RequestSummary\Models\RequestSummary $requestSummary */
        $requestSummary = RequestSummary::query()->firstOrCreate([
            'request_id' => $requestId,
            // TODO: Extract to Request model
            'method' => request()->method(),
            'url' => request()->fullUrl(),
            // TODO: Add headers
            // TODO: Add body
        ]);

        DB::listen(function (QueryExecuted $query) use ($requestId, $requestSummary) {
            if ($this->isQueryShouldBeStored($query)) {
                $this->storeStatement($requestId, $query);
                $this->updateRequestSummary($requestSummary, $query);
            }
        });
    }

    // TODO: Pass Request model instead of the string
    private function storeStatement(string $requestId, QueryExecuted $query): void
    {
        /** @var \Cog\Laravel\Sense\Statement\Models\Statement $statement */
        $statement = Statement::query()->firstOrCreate([
            'value' => $query->sql,
        ]);

        /** @var \Cog\Laravel\Sense\StatementSummary\Models\StatementSummary $summary */
        $summary = $statement->summaries()
            ->where([
                'request_id' => $requestId,
                'connection' => $query->connectionName,
            ])->first();
        if (!$summary) {
            $summary = $statement->summaries()->create([
                'request_id' => $requestId,
                'connection' => $query->connectionName,
                'time_min' => 0.0,
                'time_max' => 0.0,
                'time_total' => 0.0,
            ]);
        }
        $this->updateStatementSummary($summary, $query);
    }

    private function updateStatementSummary(StatementSummary $summary, QueryExecuted $query): void
    {
        if ($summary->getAttribute('time_min') === 0.0 || $summary->getAttribute('time_min') > $query->time) {
            $summary->setAttribute('time_min', $query->time);
        }
        if ($summary->getAttribute('time_max') < $query->time) {
            $summary->setAttribute('time_max', $query->time);
        }
        $summary->setAttribute('time_total', $summary->getAttribute('time_total') + $query->time);
        $summary->setAttribute('queries_count', $summary->getAttribute('queries_count') + 1);
        $summary->save();
    }

    private function updateRequestSummary(RequestSummary $requestSummary, QueryExecuted $query): void
    {
        $requestSummary->setAttribute('time_total', $requestSummary->getAttribute('time_total') + $query->time);
        $requestSummary->setAttribute('queries_count', $requestSummary->getAttribute('queries_count') + 1);
        $requestSummary->save();
    }

    private function isQueryShouldBeStored(QueryExecuted $query): bool
    {
        return $query->connectionName !== 'sense';
    }

    private function isSenseDisabled(): bool
    {
        $uri = config('sense.uri', 'sense');

        return $this->app->environment() !== 'local'
            || $this->app->runningInConsole()
            || request()->is($uri, "{$uri}/*")
            || request()->method() === 'OPTIONS';
    }
}
