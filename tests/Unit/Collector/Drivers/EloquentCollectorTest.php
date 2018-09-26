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

namespace Cog\Tests\Laravel\Sense\Unit\Collector\Drivers;

use Cog\Laravel\Sense\Collector\Drivers\EloquentCollector;
use Cog\Tests\Laravel\Sense\TestCase;

class EloquentCollectorTest extends TestCase
{
    /** @test */
    public function it_can_instantiate_eloquent_collector()
    {
        $collector = $this->app->make(EloquentCollector::class);

        $this->assertInstanceOf(EloquentCollector::class, $collector);
    }
}
