<?php

namespace App\DataFixtures;


class ConversionFixture
{
    const CONVERSIONS = [
        [
            "startUnit" => "centilitre",
            "endUnit" => "litre",
            "coefficient" => 0.01,
        ],
        [
            "startUnit" => "bol",
            "endUnit" => "centilitre",
            "coefficient" => 35,
        ],
        [
            "startUnit" => "verre",
            "endUnit" => "centilitre",
            "coefficient" => 25,
        ],
        [
            "startUnit" => "tasse à café",
            "endUnit" => "centilitre",
            "coefficient" => 10,
        ],
        [
            "startUnit" => "cuillère à café",
            "endUnit" => "centilitre",
            "coefficient" => 0.5,
        ],
        [
            "startUnit" => "cuillère à soupe",
            "endUnit" => "centilitre",
            "coefficient" => 1.5,
        ],
        [
            "startUnit" => "kilo",
            "endUnit" => "gramme",
            "coefficient" => 1000,
        ],
        [
            "startUnit" => "gramme",
            "endUnit" => "kilo",
            "coefficient" => 0.001,
        ],
    ];
}
