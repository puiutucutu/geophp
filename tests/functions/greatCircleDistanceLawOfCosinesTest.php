<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class greatCircleDistanceLawOfCosinesTest extends TestCase
{
    public function testReturnsExpectedValue() : void
    {
        $this->assertEquals(
            greatCircleDistanceLawOfCosines(
                43.64256,
                -79.38714,
                43.64157,
                -79.38917,
                WGS84_EQUATORIAL_RADIUS_METRES
            ),
            197.2015020383369
        );
    }
}
