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

namespace Cog\Laravel\Sense\Http\Controllers\Urls\Get;

use Illuminate\Contracts\Support\Responsable;

class Response implements Responsable
{
    /** @var \Cog\Laravel\Sense\Url\Models\Url */
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function toResponse($request)
    {
        return $request->wantsJson() ? $this->toJson() : $this->toHtml();
    }

    private function toHtml()
    {
        return view('sense::urls.view', [
            'url' => $this->url,
        ]);
    }

    private function toJson()
    {
        return [];
    }
}
