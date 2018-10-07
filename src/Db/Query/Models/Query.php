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

namespace Cog\Laravel\Sense\Db\Query\Models;

use Cog\Laravel\Sense\Db\QueryExplanation\Models\QueryExplanation;
use Cog\Laravel\Sense\Request\Models\Request;
use Cog\Laravel\Sense\Statement\Models\Statement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Query extends Model
{
    protected $connection = 'sense';

    protected $table = 'sense_request_db_queries';

    protected $fillable = [
        'statement_id',
        'connection',
        'sql',
        'bindings',
        'time',
    ];

    protected $casts = [
        'bindings' => 'json',
    ];

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class, 'request_id');
    }

    public function statement(): BelongsTo
    {
        return $this->belongsTo(Statement::class, 'statement_id');
    }

    public function explanation(): HasOne
    {
        return $this->hasOne(QueryExplanation::class, 'query_id');
    }
}
