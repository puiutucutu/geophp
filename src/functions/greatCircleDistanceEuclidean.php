<?php /** @noinspection NonAsciiCharacters */

/**
 * Calculates the distance between two coordinates on a WGS84 ellipsoid using
 * a fast but less accurate formula.
 *
 * @param float $pointOneLatitude  Decimal degrees
 * @param float $pointOneLongitude Decimal degrees
 * @param float $pointTwoLatitude  Decimal degrees
 * @param float $pointTwoLongitude Decimal degrees
 *
 * @return float Distance in metres.
 *
 * @see http://jonisalonen.com/2014/computing-distance-between-coordinates-can-be-simple-and-fast/
 */
function greatCircleDistanceEuclidean(
    $pointOneLatitude,
    $pointOneLongitude,
    $pointTwoLatitude,
    $pointTwoLongitude
) {
    $degLen = 110.25;
    $Δx = $pointOneLatitude - $pointTwoLatitude;
    $Δy = ($pointOneLongitude - $pointTwoLongitude) * cos($pointTwoLatitude);

    $d = $degLen * sqrt($Δx * $Δx + $Δy * $Δy) * 1000;

    return $d;
}
