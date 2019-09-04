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

use Illuminate\Contracts\Support\Responsable;

class Response implements Responsable
{
    /**
     * @var \Cog\Laravel\Sense\Db\Query\Models\Query[]
     */
    private $queries;

    public function __construct($queries)
    {
        $this->queries = $queries;
    }

    public function toResponse($request)
    {
        return $request->wantsJson() ? $this->toJson() : $this->toHtml();
    }

    private function toHtml()
    {
        return view('sense::queries.index', [
            'queries' => $this->queries,
        ]);
    }

    private function toJson()
    {
        return [];
    }
}
