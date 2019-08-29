<?php

/**
 * Calculates the distance between two utm coordinate pairs.
 *
 * @param float $pointOneEasting
 * @param float $pointOneNorthing
 * @param float $pointTwoEasting
 * @param float $pointTwoNorthing
 *
 * @return float
 */
function distanceBetweenUtmCoordinates(
    $pointOneEasting,
    $pointOneNorthing,
    $pointTwoEasting,
    $pointTwoNorthing
) {
    return sqrt(
        pow($pointTwoEasting - $pointOneEasting, 2) +
        pow($pointTwoNorthing - $pointOneNorthing, 2)
    );
}
