<?php /** @noinspection NonAsciiCharacters */

/**
 * @param float|integer $x
 * @param float|integer $y
 *
 * @return float|integer
 */
function divide($x, $y)
{
    return $x / $y;
}

/**
 * Calculates the distance from the earth's center to a point on the WGS84
 * ellipsoid surface at a geodetic latitude (i.e., the radius).
 *
 * @param float      $latitude A latitude expressed in decimal degrees.
 * @param float|null $equatorialRadius
 * @param float|null $polarRadius
 *
 * @see https://planetcalc.com/7721/
 * @see https://en.wikipedia.org/wiki/Earth_radius#Geocentric_radius
 *
 * @return float
 */
function geocentricRadius(
    $latitude,
    $equatorialRadius = WGS84_EQUATORIAL_RADIUS_METRES,
    $polarRadius = WGS84_POLAR_RADIUS_METRES
) {
    $φ = deg2rad($latitude);
    $a = $equatorialRadius;
    $b = $polarRadius;

    return sqrt
    (
        divide
        (
            (
                pow((pow($a, 2) * cos($φ)), 2) +
                pow((pow($b, 2) * sin($φ)), 2)
            ),
            (
                pow(($a * cos($φ)), 2) +
                pow(($b * sin($φ)), 2)
            )
        )
    );
}
