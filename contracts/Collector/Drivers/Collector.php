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

namespace Cog\Contracts\Laravel\Sense\Collector\Drivers;

interface Collector
{
    /**
     * Returns the unique name of the collector.
     *
     * @return string
     */
    public function name(): string;

    /**
     * Returns collected data.
     *
     * Called by the Sensor when data needs to be collected.
     *
     * @return array
     */
    public function collect(): array;
}
