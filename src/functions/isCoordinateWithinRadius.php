<?php

/**
 * Determines whether some coordinate pair is within a defined
 * radius of a circle using the utm coordinate system.
 *
 * Distances will be compared up to ten significant figures.
 *
 * @param float $distanceLimit The maximum allowed distance that the target
 *                             coordinate can be from the midpoint of the
 *                             circle in metres.
 * @param float $circleMidpointLatitude
 * @param float $circleMidpointLongitude
 * @param float $targetLatitude
 * @param float $targetLongitude
 *
 * @return bool
 */
function isCoordinateWithinRadius(
    $distanceLimit,
    $circleMidpointLatitude,
    $circleMidpointLongitude,
    $targetLatitude,
    $targetLongitude
) {
    $distance = greatCircleDistanceHaversine(
        $circleMidpointLatitude,
        $circleMidpointLongitude,
        $targetLatitude,
        $targetLongitude,
        WGS84_EQUATORIAL_RADIUS_METRES
    );

    return ($distanceLimit - $distance) >= EPSILON;
}
