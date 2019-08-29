<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class isCoordinateWithinRadiusTest extends TestCase
{
    private $coordinates = [
        ["latitude" => 43.64256, "longitude" => -79.38714],
        ["latitude" => 43.64157, "longitude" => -79.38917]
    ];

    public function testReturnsTrueWhenCoordinateIsInsideCircle():void
    {
        $this->assertEquals(
            isCoordinateWithinRadius(
                197.20148225015,
                $this->coordinates[0]["latitude"],
                $this->coordinates[0]["longitude"],
                $this->coordinates[1]["latitude"],
                $this->coordinates[1]["longitude"]
            ), true
        );
    }

    public function testReturnsTrueWhenCoordinateIsOnCircumference() : void
    {
        $this->assertEquals(
            isCoordinateWithinRadius(
                197.20148225014,
                $this->coordinates[0]["latitude"],
                $this->coordinates[0]["longitude"],
                $this->coordinates[1]["latitude"],
                $this->coordinates[1]["longitude"]
            ), true
        );
    }

    public function testReturnsFalseWhenCoordinateIsOutsideCircle() : void
    {
        $this->assertEquals(
            isCoordinateWithinRadius(
                197.20148225013,
                $this->coordinates[0]["latitude"],
                $this->coordinates[0]["longitude"],
                $this->coordinates[1]["latitude"],
                $this->coordinates[1]["longitude"]
            ), false
        );
    }
}
