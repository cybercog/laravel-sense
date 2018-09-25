<?php

/*
 * This file is part of Laravel Authenticator.
 *
 * (c) Anton Komarev <a.komarev@cybercog.su>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Cog\Laravel\Sense\Authentication\Services;

use Closure;
use Illuminate\Http\Request;

class Authenticator
{
    /**
     * The callback that should be used to authenticate Sense users.
     *
     * @var \Closure
     */
    public static $using;

    /**
     * Determine if the given request can access the Sense dashboard.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    public static function check(Request $request): bool
    {
        return (static::$using ?: function () {
            return app()->environment('local');
        })($request);
    }

    /**
     * Set the callback that should be used to authenticate Sense users.
     *
     * @param  \Closure $callback
     * @return void
     */
    public static function using(Closure $callback): void
    {
        static::$using = $callback;
    }
}
