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

namespace Cog\Contracts\Laravel\Sense\Storage\Drivers;

interface Storage
{
    /**
     * Returns collected data with the specified id.
     *
     * @param string $id
     * @return array
     */
    public function get(string $id): array;

    /**
     * Saves collected data.
     *
     * @param string $id
     * @param array $data
     */
    public function put(string $id, array $data): void;

    /**
     * Clears all the collected data.
     *
     * @return void
     */
    public function clear(): void;
}
