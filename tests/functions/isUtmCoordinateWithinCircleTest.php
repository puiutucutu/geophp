<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class isUtmCoordinateWithinCircleTest extends TestCase
{
    private $coordinates = [
        [
            "easting" => 630084,
            "northing" => 4833438
        ],
        [
            "easting" => 629923,
            "northing" => 4833325
        ]
    ];

    public function testReturnsTrueWhenCoordinateIsInsideCircle():void
    {
        $this->assertEquals(
            isUtmCoordinateWithinCircle(
                197.0000000001,
                $this->coordinates[0]["easting"],
                $this->coordinates[0]["northing"],
                $this->coordinates[1]["easting"],
                $this->coordinates[1]["northing"]
            ), true
        );
    }

    public function testReturnsTrueWhenCoordinateIsOnCircumference() : void
    {
        $this->assertEquals(
            isUtmCoordinateWithinCircle(
                196.6977376586,
                $this->coordinates[0]["easting"],
                $this->coordinates[0]["northing"],
                $this->coordinates[1]["easting"],
                $this->coordinates[1]["northing"]
            ), true
        );
    }

    public function testReturnsFalseWhenCoordinateIsOutsideCircle() : void
    {
        $this->assertEquals(
            isUtmCoordinateWithinCircle(
                196.6977376585,
                $this->coordinates[0]["easting"],
                $this->coordinates[0]["northing"],
                $this->coordinates[1]["easting"],
                $this->coordinates[1]["northing"]
            ), false
        );
    }
}
