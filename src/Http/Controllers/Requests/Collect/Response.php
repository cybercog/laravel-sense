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

use Illuminate\Contracts\Support\Responsable;

class Response implements Responsable
{
    /**
     * @var \Cog\Laravel\Sense\Request\Models\Request[]
     */
    private $requests;

    public function __construct($requests)
    {
        $this->requests = $requests;
    }

    public function toResponse($request)
    {
        return $request->wantsJson() ? $this->toJson() : $this->toHtml();
    }

    private function toHtml()
    {
        return view('sense::requests.index', [
            'requests' => $this->requests,
        ]);
    }

    private function toJson()
    {
        return [];
    }
}
