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

namespace Cog\Laravel\Sense\Http\Controllers\Urls\Get;

use Cog\Laravel\Sense\Http\Controllers\Controller;
use Cog\Laravel\Sense\Url\Models\Url;
use Illuminate\Database\Eloquent\Relations\Relation;

class Action extends Controller
{
    public function __invoke($url, Request $request)
    {
        $query = Url::query()->whereKey($url);

        $query->with([
            'requests' => function (Relation $relation) {
                $relation->latest('id');
            },
            'requests.summary',
        ]);

        $url = $query->firstOrFail();

        return new Response($url);
    }
}
