<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class jitterCoordinatesWithinRadiusTest extends TestCase
{
    public function testReturnsExpectedValue() : void
    {
        $radius = 50000;
        $midpoint = ["x" => 691610, "y" => 5334765];
        $target = ["x" => 691784, "y" => 5335060];
        $jitterMax = 5000;
        $jitteredCoordinate = jitterCoordinatesWithinRadius(
            50000,
            $midpoint["x"],
            $midpoint["y"],
            $target["x"],
            $target["y"],
            $jitterMax
        );

        $this->assertTrue(
            $jitteredCoordinate["x"] <= ($midpoint["x"] + $radius) &&
            $jitteredCoordinate["y"] <= ($midpoint["y"] + $radius)
        );
    }
}
