<?php /** @noinspection NonAsciiCharacters */

/**
 * Calculates the central angle between two geodetic coordinates using the
 * spherical law of cosines formula.
 *
 * @param float $φ1 Latitude of point one in radians
 * @param float $λ1 Longitude of point one in radians
 * @param float $φ2 Latitude of point two in radians
 * @param float $λ2 Longitude of point two in radians
 *
 * @see https://en.wikipedia.org/wiki/Great-circle_distance
 * @see https://en.wikipedia.org/wiki/Geodetic_datum#Geodetic_versus_geocentric_latitude
 *      For an explanation of the difference between geodetic and geodesic
 *      coordinates.
 *
 * @return float The central angle in radians.
 */
function centralAngleLawOfCosines($φ1, $λ1, $φ2, $λ2)
{
    $Δλ = $λ1 - $λ2;
    $Δσ = acos
    (
        sin($φ1) * sin($φ2) +
        cos($φ1) * cos($φ2) * cos($Δλ)
    );

    return $Δσ;
}
