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

namespace Cog\Laravel\Sense\Url\Models;

use Cog\Laravel\Sense\Request\Models\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Url extends Model
{
    protected $connection = 'sense';

    protected $table = 'sense_urls';

    protected $fillable = [
        'address',
    ];

    public function requests(): HasMany
    {
        return $this->hasMany(Request::class, 'url_id');
    }
}
