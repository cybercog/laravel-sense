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

namespace Cog\Laravel\Sense\Http\Controllers\Requests\Collect;

use Cog\Laravel\Sense\Http\Controllers\Controller;
use Cog\Laravel\Sense\Request\Models\Request as RequestModel;

class Action extends Controller
{
    public function __invoke(Request $formRequest)
    {
        $query = RequestModel::query();

        $query->with([
            'summary',
            'url',
        ]);

        $requests = $query->latest('id')->get();

        return new Response($requests);
    }
}
