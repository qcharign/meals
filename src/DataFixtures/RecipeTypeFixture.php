<?php

namespace App\DataFixtures;


class RecipeTypeFixture
{
    const RECIPE_TYPES = [
        [
            "name" => "plat",
            "image" => "images/recipe/type/meal.svg",
            "sequence" => 2,
        ],
        [
            "name" => "dessert",
            "image" => "images/recipe/type/dessert.svg",
            "sequence" => 3,
        ],
        [
            "name" => "entrée",
            "image" => "images/recipe/type/starter.svg",
            "sequence" => 1,
        ],
    ];
}
