<?php

declare(strict_types=1);

namespace Cog\Tests\Laravel\Sense;

use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /** @test */
    public function it_can_run_tests()
    {
        $this->assertTrue(true);
    }
}
