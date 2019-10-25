<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "vendor/autoload.php";

function heading($text) { echo "<h1>${text}</h1>"; }
function subheading($text) { echo "<h2>${text}</h2>"; }

$CNTower = [
    "utm" => [
        "easting" => 630084,
        "northing" => 4833438,
        "hemisphere" => "N",
        "longitudeZone" => 17,
        "latitudeBand" => "T",
    ],
    "geodetic" => [
        "longitude" => -79.38714,
        "latitude" => 43.64256,
    ],
];

$pointsOfInterest = [
    "arena" => [
        "utm" => [
            "easting" => 629923,
            "northing" => 4833325,
            "hemisphere" => "N",
            "longitudeZone" => 17,
            "latitudeBand" => "T",
        ],
        "geodetic" => [
            "longitude" => -79.38917,
            "latitude" => 43.64157,
        ]
    ],
    "aquarium" => [
        "utm" => [
            "easting" => 630158,
            "northing" => 4833430,
            "hemisphere" => "N",
            "longitudeZone" => 17,
            "latitudeBand" => "T",
        ],
        "geodetic" => [
            "longitude" => -79.38623,
            "latitude" => 43.64248,
        ]
    ],
    "park" => [
        "utm" => [
            "easting" => 630064,
            "northing" => 4833420,
            "hemisphere" => "N",
            "longitudeZone" => 17,
            "latitudeBand" => "T",
        ],
        "geodetic" => [
            "longitude" => -79.38740,
            "latitude" => 43.64240,
        ]
    ]
];

/**
 * @var $CNTowerLatLng PHPCoord\LatLng
 */
$CNTowerLatLng = createLatLngFromUtm(
    $CNTower["utm"]["easting"],
    $CNTower["utm"]["northing"],
    $CNTower["utm"]["longitudeZone"],
    $CNTower["utm"]["latitudeBand"]
);

/**
 * @var $CNTowerLatLng PHPCoord\UTMRef
 */
$CNTowerUtmRef = createUtmFromLatLng(
    $CNTowerLatLng->getLat(),
    $CNTowerLatLng->getLng()
);

/**
 * @var $pointsOfInterestLatLng PHPCoord\LatLng[]
 */
$pointsOfInterestLatLng = [
    "arena" => createLatLngFromUtm(
        $pointsOfInterest["arena"]["utm"]["easting"],
        $pointsOfInterest["arena"]["utm"]["northing"],
        $pointsOfInterest["arena"]["utm"]["longitudeZone"],
        $pointsOfInterest["arena"]["utm"]["latitudeBand"]
    ),
    "aquarium" => createLatLngFromUtm(
        $pointsOfInterest["aquarium"]["utm"]["easting"],
        $pointsOfInterest["aquarium"]["utm"]["northing"],
        $pointsOfInterest["aquarium"]["utm"]["longitudeZone"],
        $pointsOfInterest["aquarium"]["utm"]["latitudeBand"]
    ),
    "park" => createLatLngFromUtm(
        $pointsOfInterest["park"]["utm"]["easting"],
        $pointsOfInterest["park"]["utm"]["northing"],
        $pointsOfInterest["park"]["utm"]["longitudeZone"],
        $pointsOfInterest["park"]["utm"]["latitudeBand"]
    )
];

$radiusInMetres = 100;
$pointsOfInterestWithinRadiusOfCNTower = [];
foreach ($pointsOfInterest as $poiName => $poi)
{
    $isWithinRadius = isWithinRadiusUtm(
        $radiusInMetres,
        $CNTower["utm"]["easting"],
        $CNTower["utm"]["northing"],
        $poi["utm"]["easting"],
        $poi["utm"]["northing"]
    );

    $pointsOfInterestWithinRadiusOfCNTower[$poiName] = array_merge(
        $poi,
        [
            "distanceFromCNTowerInMetres (law of cosines (equitorial)" => greatCircleDistanceLawOfCosines(
                $CNTowerLatLng->getLat(),
                $CNTowerLatLng->getLng(),
                $pointsOfInterestLatLng[$poiName]->getLat(),
                $pointsOfInterestLatLng[$poiName]->getLng(),
                WGS84_EQUATORIAL_RADIUS_METRES
            ),
            "distanceFromCNTowerInMetres (law of cosines (mean))" => greatCircleDistanceLawOfCosines(
                $CNTowerLatLng->getLat(),
                $CNTowerLatLng->getLng(),
                $pointsOfInterestLatLng[$poiName]->getLat(),
                $pointsOfInterestLatLng[$poiName]->getLng(),
                WGS84_MEAN_RADIUS_METRES
            ),
            "distanceFromCNTowerInMetres (haversine)" => greatCircleDistanceHaversine(
                $CNTowerLatLng->getLat(),
                $CNTowerLatLng->getLng(),
                $pointsOfInterestLatLng[$poiName]->getLat(),
                $pointsOfInterestLatLng[$poiName]->getLng(),
                WGS84_EQUATORIAL_RADIUS_METRES
            ),
            "distanceFromCNTowerInMetres (euclidean)" => greatCircleDistanceEuclidean(
                $CNTowerLatLng->getLat(),
                $CNTowerLatLng->getLng(),
                $pointsOfInterestLatLng[$poiName]->getLat(),
                $pointsOfInterestLatLng[$poiName]->getLng()
            ),
            "isWithinRadiusOfCNTower" => $isWithinRadius,
        ]
    );
}

echo "<pre>";

heading("CN Tower");
print_r($CNTower);
subheading("CN Tower - Concrete LatLng");
print_r($CNTowerLatLng);
subheading("CN Tower - Concrete UtmRef");
print_r($CNTowerUtmRef);

heading("Points of Interest");
print_r($pointsOfInterest);

heading("Points of Interest Within Radius of CN Tower");
print_r($pointsOfInterestWithinRadiusOfCNTower);

print "</pre>";
exit;
