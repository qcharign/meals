<?php

namespace App\DataFixtures;


class SpecificConversionFixture
{
const SPECIFIC_CONVERSION = [
        [
            "ingredient" => "beurre",
            "startUnit" => "gramme",
            "endUnit" => "plaquette",
            "coefficient" => 0.004
        ],
        [
            "ingredient" => "pain à burger",
            "startUnit" => "piece",
            "endUnit" => "paquet",
            "coefficient" => 0.25
        ],
    ];
}
