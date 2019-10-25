<?php

/**
 * Adds a jitter to some utm coordinate. Ensures that the jittering process will
 * not push the coordinate outside the radius. In other words, it constrains
 * the jitter such that the coordinate remains within the radius.
 *
 * The jitter should be capped at a reasonable distance - if the jitter is not
 * capped via `jitterMax`, we lose the visual cue of clustering.
 *
 * @param int $radius           Centimeters.
 * @param int $midpointEasting  Centimeters
 * @param int $midpointNorthing Centimeters
 * @param int $targetEasting    Centimeters
 * @param int $targetNorthing   Centimeters
 * @param int $jitterMax        Centimeters
 *
 * @return array A 1-d array where `x` is the easting and `y` is the northing.
 */
function jitterCoordinatesWithinRadius(
    $radius,
    $midpointEasting,
    $midpointNorthing,
    $targetEasting,
    $targetNorthing,
    $jitterMax
) {
    $jitter = $radius >= $jitterMax ? $jitterMax : $radius * 0.618;
    $POSITIVE = 1;
    $NEGATIVE = -1;
    $xDirRand = rand(0, 1) === 0 ? $POSITIVE : $NEGATIVE;
    $yDirRand = rand(0, 1) === 0 ? $POSITIVE : $NEGATIVE;
    $xDirJitter = rand(0, $jitter);
    $yDirJitter = rand(0, $jitter);

    $jittered = [
        "x" => $targetEasting + ($xDirJitter * $xDirRand),
        "y" => $targetNorthing + ($yDirJitter * $yDirRand)
    ];

    // note the mutation performed here on `jittered` to constrain the jitter
    // within radius
    if (!isWithinRadiusUtm(
        $radius,
        $midpointEasting,
        $midpointNorthing,
        $jittered["x"],
        $jittered["y"]
    )) {
        $x = $targetEasting;
        $y = $targetNorthing;
        $jittered = [
            "x" => $x < $midpointEasting ? $x + $xDirJitter : $x - $xDirJitter,
            "y" => $y < $midpointNorthing ? $y + $yDirJitter : $y - $yDirJitter,
        ];
    }

    return $jittered;
}
