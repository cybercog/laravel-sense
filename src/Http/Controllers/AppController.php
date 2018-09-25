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

namespace Cog\Laravel\Sense\Http\Controllers;

use Cog\Laravel\Sense\RequestSummary\Models\RequestSummary;
use Cog\Laravel\Sense\StatementSummary\Models\StatementSummary;

class AppController extends Controller
{
    public function __invoke($requestId = null)
    {
        if ($requestId) {
            $summaries = StatementSummary::query()
                ->where('request_id', $requestId)
                ->latest('id')
                ->get();

            $requestSummary = RequestSummary::query()
                ->where('request_id', $requestId)
                ->firstOrFail();

            return view('sense::statements', compact('summaries', 'requestSummary'));
        }

        $summaries = RequestSummary::query()
            ->latest('id')
            ->get();

        return view('sense::requests', compact('summaries'));
    }
}
