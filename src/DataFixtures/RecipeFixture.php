<?php

namespace App\DataFixtures;

use App\Entity\Recipe;

class RecipeFixture {

    const RECIPES = [
        [
            "name" => "pates carbonara",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "people" => 4,
            "ingredients" => [
                [
                    "ingredient" => "pate",
                    "quantity" => 500,
                    "unit" => "gramme"
                ],
                [
                    "ingredient" => "œuf",
                    "quantity" => 1,
                    "unit" => "piece"
                ],
                [
                    "ingredient" => "crème fraiche épaisse",
                    "quantity" => 250,
                    "unit" => "gramme"
                ],
                [
                    "ingredient" => "lardon",
                    "quantity" => 250,
                    "unit" => "gramme"
                ],
                [
                    "ingredient" => "parmesan",
                    "quantity" => 100,
                    "unit" => "gramme"
                ],

            ]
        ],
        [
            "name" => "fajitas",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "tomate cerise",
                "maïs",
                "crème fraiche épaisse",
                "viande hachée",
                "emmental rapé",
                "avocat",
                "ail",
                "épice guacamole",
                "épice viande",
                "tortilla"
            ],
        ],
        [
            "name" => "œufs à la coque",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                [
                    "ingredient" => "œuf",
                    "quantity" => 4,
                    "unit" => "piece"
                ],
                [
                    "ingredient" => "pain",
                    "quantity" => 1,
                    "unit" => "piece",
                ],
            ]
        ],
        [
            "name" => "burger",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                [
                    "ingredient" => "pain à burger",
                    "quantity" => 4,
                    "unit" => "piece"
                ],
                [
                    "ingredient" => "tomate",
                    "quantity" => 1,
                    "unit" => "piece",
                ],
                [
                    "ingredient" => "oignon rouge",
                    "quantity" => 1,
                    "unit" => "piece"
                ],
                [
                    "ingredient" => "cheddar en tranche",
                    "quantity" => 4,
                    "unit" => "piece",
                ],
                [
                    "ingredient" => "béarnaise",
                    "quantity" => 1,
                    "unit" => "piece"
                ],
                [
                    "ingredient" => "ketchup",
                    "quantity" => 1,
                    "unit" => "piece"
                ],
                [
                    "ingredient" => "mayonnaise",
                    "quantity" => 1,
                    "unit" => "piece"
                ],
                [
                    "ingredient" => "salade verte",
                    "quantity" => 1,
                    "unit" => "piece"
                ],
            ],
        ],
        [
            "name" => "tarte tatin",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "dessert",
            "ingredients" => [
                [
                    "ingredient" => "beurre",
                    "quantity" => 100,
                    "unit" => "gramme"
                ],
                [
                    "ingredient" => "pomme golden",
                    "quantity" => 8,
                    "unit" => "piece"
                ],
                [
                    "ingredient" => "pate feuilletée",
                    "quantity" => 1,
                    "unit" => "piece"
                ],
                [
                    "ingredient" => "sucre",
                    "quantity" => 100,
                    "unit" => "gramme"
                ],
                [
                    "ingredient" => "sucre vanillé",
                    "quantity" => 2,
                    "unit" => "piece"
                ],
            ],
        ],
        [
            "name" => "ramen",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "bœuf",
                "pate ramen",
            ],
        ],
        [
            "name" => "salade caesar",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "aiguilette de poulet",
                "salade verte",
                "parmesan",
                "pain",
            ],
        ],
        [
            "name" => "gaspacho",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "tomate",
                "poivron",
                "concombre",
                "melon",
                "huile d'olive",
                "vinaigre",
            ],
        ],
        [
            "name" => "poulet thai",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "aiguilette de poulet",
                "oignon",
                "poivron",
                "cacahuète",
                "soja",
                "huile",
                "sucre",
                "sauce soja",
                "sauce nuoc man",
                "caramel liquide",
            ],
        ],
        [
            "name" => "gnocci",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "gnocci",
            ],
        ],
        [
            "name" => "salade composée",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "riz",
                "tomate",
                "concombre",
                "maïs",
                "lardon",
            ],
        ],
        [
            "name" => "raviole",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "raviole",
            ],
        ],
        [
            "name" => "sauce lentille",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "saucisse",
                "lentille",
                "oignon",
                "carotte",
            ],
        ],
        [
            "name" => "blé dinde",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "blé",
                "dinde",
            ],
        ],
        [
            "name" => "potage",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "vermicelle",
                "poireau",
                "bouillon",
            ],
        ],
        [
            "name" => "gratin de pate",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "pate",
                [
                    "ingredient" => "beurre",
                    "quantity" => "30",
                    "unit" => "gramme",
                ],
                [
                    "ingredient" => "farine",
                    "quantity" => "30",
                    "unit" => "gramme",
                ],
            ],
        ],
        [
            "name" => "gratin de choux fleur",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "choux fleur",
                [
                    "ingredient" => "beurre",
                    "quantity" => "30",
                    "unit" => "gramme",
                ],
                [
                    "ingredient" => "farine",
                    "quantity" => "30",
                    "unit" => "gramme",
                ],
                "lait",
                "sel",
                "poivre",
                "emmental rapé",
                "lardon",
            ],
        ],
        [
            "name" => "gratin courgette",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "courgette",
                [
                    "ingredient" => "beurre",
                    "quantity" => "30",
                    "unit" => "gramme",
                ],
                [
                    "ingredient" => "farine",
                    "quantity" => "30",
                    "unit" => "gramme",
                ],
                "lait",
                "sel",
                "poivre",
                "emmental rapé",
                "lardon",
            ],
        ],
        [
            "name" => "lasagne",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "pate lasagne",
                "viande hachée",
                "parmesan",
                "beurre",
                "farine",
                "lait",
                "sel",
                "poivre",
                "emmental rapé",
                "sauce tomate",
            ],
        ],
        [
            "name" => "quenelle",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "quenelle",
                [
                    "ingredient" => "beurre",
                    "quantity" => "30",
                    "unit" => "gramme",
                ],
                [
                    "ingredient" => "farine",
                    "quantity" => "30",
                    "unit" => "gramme",
                ],
                "lait",
                "sel",
                "poivre",
                "emmental rapé",
                "sauce tomate",
                "olive",
            ],
        ],
         [
            "name" => "crumble de courgette",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "courgette",
                "beurre",
                "farine",
                "poivre",
                "sel",
                "lardon",
                "emmental rapé",
            ],
        ],
         [
            "name" => "pizza",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "pate pizza",
                "sauce tomate",
                "charcuterie",
                "emmental rapé",
                "mozzarella",
            ],
        ],
         [
            "name" => "pizza big apple",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "pate pizza",
                "pomme",
                "raclette",
                "sauce napolitaine",
                "lardon",
            ],
        ],
         [
            "name" => "baggle",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "pain baggle",
                "fromage frais",
                "charcuterie",
                "salade",
            ],
        ],
         [
            "name" => "woke",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "nouille chinoise",
                "bœuf",
                "soja",
                "concombre",
                "avocat",
                "tomate",
                "nem",
            ],
        ],
         [
            "name" => "riz cantonais",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "riz",
                "petit pois",
                "œuf",
                "lardon",
            ],
        ],
         [
            "name" => "tomate farcie",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "tomate à farcir",
                "courgette à farcir",
                "poivron",
                "chair à saucisse",
                "pain de mie",
                "œuf",
                "huile d'olive",
                "oignon",
                "ail",
                "riz",
                "bouillon de bœuf",
            ],
        ],
         [
            "name" => "omelette",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "œuf",
                "emmental rapé",
            ],
        ],
         [
            "name" => "œuf dur",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "œuf",
            ],
        ],
         [
            "name" => "chili con carne",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "steack haché",
                "haricot rouge",
                "oignon",
                "beurre",
                "bouillon de bœuf",
                "concentré de tomate",
                "ail",
                "épice",
                "riz",
            ],
        ],
         [
            "name" => "panini",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "pain panini",
                "cheddar en tranche",
                "charcuterie",
                "ketchup",
                "béarnaise",
            ],
        ],
         [
            "name" => "tartine",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "pain tartine",
                "ail",
                "tomate",
                "charcuterie",
                "emmental rapé",
                "mozzarella",
            ],
        ],
         [
            "name" => "crepe",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "farine",
                "sel",
                "sucre",
                "beurre",
                "lait",
                "œuf",
            ],
        ],
         [
            "name" => "galette bretonne",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "galette",
                "charcuterie",
                "emmental rapé",
                "œuf",
            ],
        ],
         [
            "name" => "croque monsieur",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "pain de mie",
                "charcuterie",
                "cheddar en tranche",
            ],
        ],
         [
            "name" => "brique",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "feuille de brique",
                "jambon cru",
                "tomate",
                "huile d'olive",
                "chèvre",
                "miel",
            ],
        ],
         [
            "name" => "raclette",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "raclette",
                "charcuterie",
                "pomme de terre",
                "cornichon",
            ],
        ],
         [
            "name" => "fondue",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "fromage fondue",
                "vin blanc cuisine",
                "pain",
            ],
        ],
         [
            "name" => "soupe",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "soupe",
            ],
        ],
         [
            "name" => "endive au jambon",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "endive",
                "jambon blanc",
                "beurre",
                "farine",
                "lait",
                "sel",
                "poivre",
                "emmental rapé",
            ],
        ],
         [
            "name" => "wrap",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "tortilla",
                "poulet",
                "cheddar en tranche",
                "salade",
            ],
        ],
         [
            "name" => "tartare",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "viande hachée",
                "échalotte",
                "capre",
                "cornichon",
            ],
        ],
         [
            "name" => "terrine aubergine",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "riste aubergine",
                "œuf",
                "sel",
                "poivre",
                "crème fraiche épaisse",
            ],
        ],
         [
            "name" => "taboulet syrien",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "boulgoure fin",
                "tomate",
                "salade verte",
                "huile d'olive",
                "citron",
                "persil",
                "oignon",
            ],
        ],
         [
            "name" => "poulet basquaise",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "poulet",
                "oignon",
                "tomate",
                "poivron",
                "ail",
                "huile d'olive",
                "bouquet garni",
            ],
        ],
         [
            "name" => "tarte mozza",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "pate feuilletée",
                "mozzarella",
                "tomate",
                "oignon rouge",
            ],
        ],
         [
            "name" => "moussaka",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "aubergine",
                "courgette",
                "tomate",
                "ail",
                "concentré de tomate",
                "huile d'olive",
                "viande hachée",
                "oignon",
                "farine",
                "beurre",
                "lait",
                "sel",
                "poivre",
                "emmental rapé",
            ],
        ],
         [
            "name" => "tourte épinard",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "pate feuilletée",
                "pate feuilletée",
                "épinard",
                "crème fraiche liquide",
                "saumon",
            ],
        ],
         [
            "name" => "tartiflette",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "pomme de terre",
                "reblochon",
                "oignon",
                "crème fraiche épaisse",
                "lardon",
            ],
        ],
         [
            "name" => "flamenkuche",
             "owner" => "alexiane.sichi@gmail.com",
             "type" => "plat",
            "ingredients" => [
                "pate feuilletée",
                "lardon",
                "crème fraiche épaisse",
                "oignon",
            ],
        ],
        [
            "name" => "blanquette de veau",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "bouillon de légume",
                "carotte",
                "champignon",
                "citron",
                "farine",
                "blanquette de veau",
                "oignon",
                "crème fraiche épaisse",
                "vin blanc cuisine",
            ],
        ],
        [
            "name" => "bœuf bourguignon",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "bœuf bourguignon",
                "lardon",
                "oignon",
                "champignon",
                "ail",
                "farine",
                "bouquet garni",
                "beurre",
                "vin rouge cuisine",
            ],
        ],
        [
            "name" => "poulet indien",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "poulet",
                "riz",
                "curry",
                "huile d'olive",
                "tomate",
                "concombre",
                "carotte",
                "cacahuète",
                "vinaigre balsamique",
            ],
        ],
        [
            "name" => "pate bolognaise",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "pate",
                "bolognaise",
            ],
        ],
        [
            "name" => "pate pesto",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "pate",
                "pesto",
            ],
        ],
        [
            "name" => "saucisse purée",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "pomme de terre",
                "saucisse",
                "beurre",
                "lait",
            ],
        ],
        [
            "name" => "petit pois poisson",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "petit pois surgelé",
                "poisson pané",
                "carotte",
                "pomme de terre",
                "bouillon",
                "lardon",
            ],
        ],
        [
            "name" => "nuggets fritte",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "nuggets",
                "frite",
            ],
        ],
        [
            "name" => "légume cordon bleu",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "haricot",
                "pomme de terre",
                "cordon bleu",
            ],
        ],
        [
            "name" => "risotto",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "risotto",
                "chorizzo",
                "beurre",
                "vin blanc cuisine",
                "parmesan",
            ],
        ],
        [
            "name" => "saumon papillotte",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "saumon",
                "poivron",
                "tomate",
                "huile d'olive",
                "citron",
                "riz",
                "haricot",
            ],
        ],
        [
            "name" => "tarte au pomme",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "plat",
            "ingredients" => [
                "pate sablée",
                "pomme",
                "compote",
            ],
        ],
        [
            "name" => "charlotte framboise",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "dessert",
            "ingredients" => [
                "biscuit cuillère",
                "framboise surgelée",
                "sirop fruit rouge",
                "citron",
                "sucre",
                "mascarpone",
                "crème fraiche épaisse",
                "gélatine",
            ],
        ],
        [
            "name" => "moelleux chocolat",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "dessert",
            "ingredients" => [
                "sucre",
                "farine",
                "chocolat",
                "beurre",
                "œuf",
                "levure patissière",
            ],
        ],
        [
            "name" => "gateau yaourt",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "dessert",
            "ingredients" => [
                "farine",
                "sucre",
                "œuf",
                "yaourt nature",
                "citron",
                "huile",
                "levure patissière",
            ],
        ],
        [
            "name" => "cookies",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "dessert",
            "ingredients" => [
                "farine",
                "maïzena",
                "sucre",
                "sel",
                "vanille",
                "pépite de chocolat",
                "beurre",
                "œuf",
            ],
        ],
        [
            "name" => "muffin pépitte chocolat",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "dessert",
            "ingredients" => [
                "farine",
                "sucre",
                "lait",
                "vanille",
                "pépite de chocolat",
                "œuf",
                "beurre",
                "nutella",
            ],
        ],
        [
            "name" => "bananabread",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "dessert",
            "ingredients" => [
                "farine",
                "sucre",
                "levure patissière",
                "bicarbonate",
                "sel",
                "banane",
                "lait",
                "beurre",
                "œuf",
            ],
        ],
        [
            "name" => "sablé",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "dessert",
            "ingredients" => [
                "beurre",
                "sucre",
                "œuf",
                "farine",
            ],
        ],
        [
            "name" => "marbré",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "dessert",
            "ingredients" => [
                "beurre",
                "œuf",
                "sucre",
                "crème fraiche liquide",
                "farine",
                "levure patissière",
                "vanille",
                "chocolat en poudre",
            ],
        ],
        [
            "name" => "tiramisu citron",
            "owner" => "alexiane.sichi@gmail.com",
            "type" => "dessert",
            "ingredients" => [
                "sucre",
                "citron",
                "biscuit cuillère",
                "œuf",
                "mascarpone",
            ],
        ],
    ];
}
