<?php

use PHPCoord\LatLng;
use PHPCoord\UTMRef;

/**
 * @param integer|float $easting       A utm easting planar coordinate in metres
 * @param integer|float $northing      A utm northing planar coordinate in metres
 * @param integer       $longitudeZone 1 to 60
 * @param string        $latitudeBand  One of CDEFGHJKLMNPQRSTUVWX
 *
 * @return LatLng
 */
function createLatLngFromUtm($easting, $northing, $longitudeZone, $latitudeBand)
{
    $UTMRef = new UTMRef($easting, $northing, 0, $latitudeBand, $longitudeZone);
    $LatLng = $UTMRef->toLatLng();
    $LatLng->toWGS84(); // optional, for GPS compatibility

    return $LatLng;
}
