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

namespace Cog\Laravel\Sense\RequestSummary\Models;

use Cog\Laravel\Sense\Request\Models\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestSummary extends Model
{
    protected $connection = 'sense';

    protected $table = 'sense_request_summaries';

    protected $fillable = [
        'queries_count',
        'time_total',
    ];

    protected $casts = [
        'queries_count' => 'int',
        'time_total' => 'float',
    ];

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class, 'request_id');
    }
}
