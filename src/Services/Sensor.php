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

namespace Cog\Laravel\Sense\Services;

use Cog\Contracts\Laravel\Sense\Storage\Drivers\Storage as StorageContract;

class Sensor
{
    /**
     * @var \Cog\Contracts\Laravel\Sense\Storage\Drivers\Storage
     */
    private $storage;

    public function __construct(StorageContract $storage)
    {
        $this->storage = $storage;
    }

    public function storage(): StorageContract
    {
        return $this->storage;
    }
}
