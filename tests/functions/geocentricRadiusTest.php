<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class geocentricRadiusTest extends TestCase
{
    public function testReturnsExpectedValue() : void
    {
        $this->assertEquals(geocentricRadius(43.64216), 6367996.035040748);
    }
}
