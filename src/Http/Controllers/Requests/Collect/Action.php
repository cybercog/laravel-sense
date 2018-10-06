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

namespace Cog\Laravel\Sense\Http\Controllers\Requests\Collect;

use Cog\Laravel\Sense\Http\Controllers\Controller;
use Cog\Laravel\Sense\RequestSummary\Models\RequestSummary;

class Action extends Controller
{
    public function __invoke(Request $request)
    {
        $requestSummaries = RequestSummary::query()
            ->latest('id')
            ->get();

        return new Response($requestSummaries);
    }
}
