<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class kilometresToMetresTest extends TestCase
{
    public function testReturnsExpectedValue() : void
    {
        $this->assertEquals(kilometresToMetres(1), 1000);
    }
}
