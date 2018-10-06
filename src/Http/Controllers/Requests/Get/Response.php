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

use Illuminate\Contracts\Support\Responsable;

class Response implements Responsable
{
    /**
     * @var \Cog\Laravel\Sense\RequestSummary\Models\RequestSummary
     */
    private $requestSummary;

    /**
     * @var \Cog\Laravel\Sense\StatementSummary\Models\StatementSummary[]
     */
    private $statementSummaries;

    public function __construct($requestSummary, $statementSummaries)
    {
        $this->requestSummary = $requestSummary;
        $this->statementSummaries = $statementSummaries;
    }

    public function toResponse($request)
    {
        return $request->wantsJson() ? $this->toJson() : $this->toHtml();
    }

    private function toHtml()
    {
        return view('sense::requests.view', [
            'requestSummary' => $this->requestSummary,
            'statementSummaries' => $this->statementSummaries,
        ]);
    }

    private function toJson()
    {
        return [];
    }
}
