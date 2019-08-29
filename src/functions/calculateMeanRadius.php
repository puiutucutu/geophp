<?php

/**
 * @see https://en.wikipedia.org/wiki/Earth_radius#Mean_radius
 * @return float
 */
function calculateMeanRadius()
{
    return (2 * WGS84_EQUATORIAL_RADIUS_METRES + WGS84_POLAR_RADIUS_METRES) / 3;
}
