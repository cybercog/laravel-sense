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

namespace Cog\Tests\Laravel\Sense\Stubs\Storage\Drivers;

use Cog\Contracts\Laravel\Sense\Storage\Drivers\Storage as StorageContract;

class TestStorage implements StorageContract
{
    public function get(string $id): array
    {
        return [];
    }

    public function put(string $id, array $data): void
    {
    }

    public function clear(): void
    {
    }
}
