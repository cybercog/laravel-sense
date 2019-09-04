<?php

/*
 * This file is part of Laravel Sense.
 *
 * (c) Anton Komarev <anton@komarev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Cog\Laravel\Sense\Http\Controllers\Queries\Collect;

use Cog\Laravel\Sense\Db\Query\Models\Query;
use Cog\Laravel\Sense\Http\Controllers\Controller;

class Action extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Query::query();

        if ($requestId = $request->input('filter.request.id')) {
            $query->where('request_id', $requestId);
        }
        if ($statementId = $request->input('filter.statement.id')) {
            $query->where('statement_id', $statementId);
        }

        $query->with([
        ]);

        $queries = $query->latest('id')->get();

        return new Response($queries);
    }
}
