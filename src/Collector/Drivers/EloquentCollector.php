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

namespace Cog\Laravel\Sense\Collector\Drivers;

use Cog\Contracts\Laravel\Sense\Collector\Drivers\Collector as CollectorContract;
use Illuminate\Database\Connection;
use Illuminate\Database\Events\QueryExecuted;

class EloquentCollector implements CollectorContract
{
    /**
     * @var \Illuminate\Database\Connection
     */
    private $connection;

    private $queries = [];

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Returns the unique name of the collector.
     *
     * @return string
     */
    public function name(): string
    {
        return 'eloquent';
    }

    /**
     * Returns collected data.
     *
     * Called by the Sensor when data needs to be collected.
     *
     * @return array
     */
    public function collect(): array
    {
        $this->connection->listen(function (QueryExecuted $executed) {
            $this->queries[] = $executed;
        });

        return $this->queries;
    }
}
