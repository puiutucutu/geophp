<?php

/**
 * Determines whether a coordinate pair is within the radius of a circle
 * using the utm coordinate system.
 *
 * Distances will be compared up to ten significant figures.
 *
 * @param float $distanceLimit    The maximum allowed distance that the target
 *                                coordinate can be from the midpoint of the
 *                                circle in metres.
 * @param float $pointOneEasting  In metres.
 * @param float $pointOneNorthing In metres.
 * @param float $pointTwoEasting  In metres.
 * @param float $pointTwoNorthing In metres.
 *
 * @return bool
 */
function isWithinRadiusUtm(
    $distanceLimit,
    $pointOneEasting,
    $pointOneNorthing,
    $pointTwoEasting,
    $pointTwoNorthing
) {
    $distance = distanceBetweenUtmCoordinates(
        $pointOneEasting,
        $pointOneNorthing,
        $pointTwoEasting,
        $pointTwoNorthing
    );

    return ($distanceLimit - $distance) >= EPSILON;
}
