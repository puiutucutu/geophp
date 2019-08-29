<?php

use PHPCoord\LatLng;
use PHPCoord\RefEll;
use PHPCoord\UTMRef;

/**
 * Uses WGS84 ellipsoid.
 *
 * @param float $latitude
 * @param float $longitude
 *
 * @return UTMRef
 */
function createUtmFromLatLng($latitude, $longitude)
{
    $LatLng = new LatLng($latitude, $longitude, 0, RefEll::wgs84());

    return $LatLng->toUTMRef();
}
