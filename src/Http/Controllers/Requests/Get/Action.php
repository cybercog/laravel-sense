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

namespace Cog\Laravel\Sense\Http\Controllers\Requests\Get;

use Cog\Laravel\Sense\Http\Controllers\Controller;
use Cog\Laravel\Sense\Request\Models\Request as RequestModel;
use Illuminate\Database\Eloquent\Relations\Relation;

class Action extends Controller
{
    public function __invoke($correlationId, Request $formRequest)
    {
        $query = RequestModel::query()->where('correlation_id', $correlationId);

        $query->with([
            'url',
            'summary',
            'statementSummaries' => function (Relation $relation) {
                $relation->latest('id');
            },
            'statementSummaries.statement',
        ]);

        $request = $query->firstOrFail();

        return new Response($request);
    }
}
