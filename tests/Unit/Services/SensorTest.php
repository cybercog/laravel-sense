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

namespace Cog\Tests\Laravel\Sense\Unit\Services;

use Cog\Laravel\Sense\Services\Sensor;
use Cog\Tests\Laravel\Sense\Stubs\Storage\Drivers\TestStorage;
use Cog\Tests\Laravel\Sense\TestCase;

class SensorTest extends TestCase
{
    /** @test */
    public function it_can_instantiate_sensor_with_custom_storage()
    {
        $storage = new TestStorage();
        $sensor = new Sensor($storage);

        $this->assertInstanceOf(Sensor::class, $sensor);
        $this->assertInstanceOf(TestStorage::class, $sensor->storage());
    }
}
