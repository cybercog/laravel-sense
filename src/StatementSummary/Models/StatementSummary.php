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

namespace Cog\Laravel\Sense\StatementSummary\Models;

use Cog\Laravel\Sense\Statement\Models\Statement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatementSummary extends Model
{
    protected $connection = 'sense';

    protected $table = 'sense_statement_summaries';

    protected $fillable = [
        'request_id',
        'connection',
        'time_min',
        'time_max',
        'time_total',
    ];

    protected $casts = [
        'queries_count' => 'int',
        'time_total' => 'float',
        'time_min' => 'float',
        'time_max' => 'float',
    ];

    public function statement(): BelongsTo
    {
        return $this->belongsTo(Statement::class, 'statement_id');
    }
}
