<?php /** @noinspection NonAsciiCharacters */

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "constants.php";

/**
 * Calculates the distance between two coordinates on a WGS84 ellipsoid using
 * the haversine formula.
 *
 * @param float $pointOneLatitude  Decimal degrees
 * @param float $pointOneLongitude Decimal degrees
 * @param float $pointTwoLatitude  Decimal degrees
 * @param float $pointTwoLongitude Decimal degrees
 * @param float $radius
 *
 * @return float Distance in metres.
 *
 * @see https://en.wikipedia.org/wiki/Great-circle_distance
 * @see https://en.wikipedia.org/wiki/World_Geodetic_System
 * @see https://en.wikipedia.org/wiki/Haversine_formula
 */
function greatCircleDistanceHaversine(
    $pointOneLatitude,
    $pointOneLongitude,
    $pointTwoLatitude,
    $pointTwoLongitude,
    $radius
) {
    $φ1 = deg2rad($pointOneLatitude);
    $φ2 = deg2rad($pointTwoLatitude);
    $λ1 = deg2rad($pointOneLongitude);
    $λ2 = deg2rad($pointTwoLongitude);

    $Δφ = $φ1 - $φ2;
    $Δλ = $λ1 - $λ2;

    $a = sin($Δφ / 2) * sin($Δφ / 2) + cos($φ1) * cos($φ2) * sin($Δλ / 2) * sin($Δλ / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $d = $radius * $c;

    return $d;
}
