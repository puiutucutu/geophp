<?php

/**
 * @param float $latitude
 * @param float $longitude
 * @param float $distanceMetres Represented in meters.
 *
 * @return array
 *
 * A 2-d array. The coordinate pairs representing bottom left from
 * the circle midpoint as defined by the function arguments latitude
 * and longitude is (latitude min, longitude min) and the coordinate
 * pair representing the top right is (latitude max, longitude max).
 *
 * @example Return value.
 *
 * Array
 * (
 *     [latitude] => Array
 *         (
 *             [min] => 43.453986133363
 *             [max] => 43.455784776575
 *         )
 *
 *     [longitude] => Array
 *         (
 *             [min] => -79.681616719068
 *             [max] => -79.679138962924
 *         )
 *
 * )
 *
 */
function createSquareBoundaryAroundCircle(
    $latitude,
    $longitude,
    $distanceMetres
) {
    $EARTH_RADIUS = 6371;
    $distanceKilometres = metresToKilometres($distanceMetres);

    $maxLat = $latitude + rad2deg($distanceKilometres / $EARTH_RADIUS);
    $minLat = $latitude - rad2deg($distanceKilometres / $EARTH_RADIUS);
    $maxLng = $longitude + rad2deg($distanceKilometres / $EARTH_RADIUS / cos(deg2rad($latitude)));
    $minLng = $longitude - rad2deg($distanceKilometres / $EARTH_RADIUS / cos(deg2rad($latitude)));

    return [
        "latitude" => [
            "min" => $minLat,
            "max" => $maxLat
        ],
        "longitude" => [
            "min" => $minLng,
            "max" => $maxLng
        ]
    ];
}
