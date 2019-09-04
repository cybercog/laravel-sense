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

namespace Cog\Laravel\Sense\Http\Controllers\Queries\Get;

use Cog\Laravel\Sense\Db\Query\Models\Query;
use Cog\Laravel\Sense\Http\Controllers\Controller;

class Action extends Controller
{
    public function __invoke($query, Request $request)
    {
        $query = Query::query()->whereKey($query);

        $query->with([
        ]);

        $queryModel = $query->firstOrFail();

        return new Response($queryModel);
    }
}
