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

namespace Cog\Laravel\Sense\Request;

use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;
use Throwable;

final class Id
{
    public static function make(): string
    {
        try {
            return Uuid::uuid4()->toString();
        } catch (UnsatisfiedDependencyException $exception) {
            Log::critical('Caught exception: ' . $exception->getMessage() . "\n");
        } catch (Throwable $exception) {
            Log::critical('Caught exception: ' . $exception->getMessage() . "\n");
        }

        return '';
    }
}
