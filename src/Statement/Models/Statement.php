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

namespace Cog\Laravel\Sense\Statement\Models;

use Cog\Laravel\Sense\Request\Models\Request;
use Cog\Laravel\Sense\StatementSummary\Models\StatementSummary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Statement extends Model
{
    protected $connection = 'sense';

    protected $table = 'sense_statements';

    protected $fillable = [
        'value',
    ];

    public function summaries(): HasMany
    {
        return $this->hasMany(StatementSummary::class, 'statement_id');
    }

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class, 'request_id');
    }
}
