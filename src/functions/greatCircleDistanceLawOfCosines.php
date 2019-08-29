<?php /** @noinspection NonAsciiCharacters */

/**
 * Calculates the distance between two coordinates on a WGS84 ellipsoid using
 * the spherical law of cosines formula.
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
 * @see https://en.wikipedia.org/wiki/Spherical_law_of_cosines
 */
function greatCircleDistanceLawOfCosines(
    $pointOneLatitude,
    $pointOneLongitude,
    $pointTwoLatitude,
    $pointTwoLongitude,
    $radius
) {
    $Δσ = centralAngleLawOfCosines
    (
        deg2rad($pointOneLatitude),
        deg2rad($pointOneLongitude),
        deg2rad($pointTwoLatitude),
        deg2rad($pointTwoLongitude)
    );

    return $radius * $Δσ;
}
