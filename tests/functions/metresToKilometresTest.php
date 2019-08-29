<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class metresToKilometres extends TestCase
{
    public function testReturnsExpectedValue() : void
    {
        $this->assertEquals(metresToKilometres(1000), 1);
    }
}
