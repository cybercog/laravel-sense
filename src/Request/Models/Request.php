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

namespace Cog\Laravel\Sense\Request\Models;

use Cog\Laravel\Sense\RequestSummary\Models\RequestSummary;
use Cog\Laravel\Sense\StatementSummary\Models\StatementSummary;
use Cog\Laravel\Sense\Url\Models\Url;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Request extends Model
{
    protected $connection = 'sense';

    protected $table = 'sense_requests';

    protected $fillable = [
        'correlation_id',
        'url_id',
        'method',
    ];

    public function url(): BelongsTo
    {
        return $this->belongsTo(Url::class, 'url_id');
    }

    public function summary(): HasOne
    {
        return $this->hasOne(RequestSummary::class, 'request_id');
    }

    public function statementSummaries(): HasMany
    {
        return $this->hasMany(StatementSummary::class, 'request_id');
    }
}
