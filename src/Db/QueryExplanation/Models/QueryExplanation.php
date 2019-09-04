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

namespace Cog\Laravel\Sense\Db\QueryExplanation\Models;

use Illuminate\Database\Eloquent\Model;

class QueryExplanation extends Model
{
    protected $connection = 'sense';

    protected $table = 'sense_request_db_query_explanations';

    protected $fillable = [
        'query_id',
        'result',
    ];

    protected $casts = [
        'result' => 'json',
    ];
}
