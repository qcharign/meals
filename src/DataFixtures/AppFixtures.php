<?php

namespace App\DataFixtures;

use App\Entity\Conversion;
use App\Entity\Department;
use App\Entity\Ingredient;
use App\Entity\Recipe;
use App\Entity\RecipeRow;
use App\Entity\ShoppingList;
use App\Entity\ShoppingListRow;
use App\Entity\SpecificConversion;
use App\Entity\Unit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{

    const UNITS = [
        [
            "name" => "piece",
            "abbreviation" => ""
        ],
        [
            "name" => "kilo",
            "abbreviation" => "kg"
        ],
        [
            "name" => "gramme",
            "abbreviation" => "g"
        ],
        [
            "name" => "litre",
            "abbreviation" => "l"
        ],
        [
            "name" => "millilitre",
            "abbreviation" => "ml"
        ],
        [
            "name" => "centilitre",
            "abbreviation" => "cl"
        ],
        [
            "name" => "cuillère à soupe",
            "abbreviation" => "cuillère à soupe"
        ],
        [
            "name" => "cuillère à café",
            "abbreviation" => "cuillère à café"
        ],
        [
            "name" => "tasse à café",
            "abbreviation" => "tasse à café"
        ],
        [
            "name" => "verre",
            "abbreviation" => "verre"
        ],
        [
            "name" => "bol",
            "abbreviation" => "bol"
        ],
        [
            "name" => "plaquette",
            "abbreviation" => "plaquette"
        ],
    ];

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

    const SPECIFIC_CONVERSION = [
        [
            "ingredient" => "Beurre",
            "startUnit" => "gramme",
            "endUnit" => "plaquette",
            "coefficient" => 0.004
        ]
    ];

    const INGREDIENTS = [
        [
            "name" => "Fruit & Légume",
            "image" => "https://cdn-icons-png.flaticon.com/128/1147/1147832.png",
            "ingredients" => [
                [
                    "name" => "Aubergine",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Ail",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Avocat",
                    "image" => "https://cdn-icons-png.flaticon.com/64/135/135609.png"
                ],
                [
                    "name" => "Bettrave",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Brocoli",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Banane",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Épinard",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Carotte",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Chou",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Courge",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Échalotte",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Concombre",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Champignon",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Haricot rouge",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Endive",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Haricot",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Salade",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Salade verte",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Poivron",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Pomme de terre",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Pomme",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Pomme golden",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Betternut",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Choux fleur",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Melon",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Poireau",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Citron",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Persil",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Oignon",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Oignon rouge",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Oignon blanc",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Petit pois",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Tomate cerise",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Tomate à farcir",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Courgette à farcir",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Tomate",
                    "image" => "https://cdn-icons-png.flaticon.com/64/135/135702.png"
                ],
                [
                    "name" => "Courgette",
                    "defaultUnit" => "piece",
                ],
            ],
        ],
        [
            "name" => "Fromage" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/3753/3753482.png",
            "ingredients" => [
                [
                    "name" => "Emmental rapé"
                ],
                [
                    "name" => "Comté"
                ],
                [
                    "name" => "Parmesan"
                ],
                [
                    "name" => "Raclette"
                ],
                [
                    "name" => "Vache qui rit"
                ],
                [
                    "name" => "Kiri"
                ],
                [
                    "name" => "Raclette"
                ],
                [
                    "name" => "Fromage fondue"
                ],
                [
                    "name" => "Mascarpone"
                ],
                [
                    "name" => "Reblochon"
                ],
                [
                    "name" => "Chèvre"
                ],
                [
                    "name" => "Fromage frais"
                ],
                [
                    "name" => "Mozzarella"
                ],
                [
                    "name" => "Fromage à Croc Monssieur"
                ],
                [
                    "name" => "Cheddar en tranche"
                ],
                [
                    "name" => "Crème fraiche épaisse"
                ],
                [
                    "name" => "Crème fraiche liquide"
                ],
                [
                    "name" => "Divers"
                ],
                [
                    "name" => "Beurre",
                    "defaultUnit" => "plaquette",
                    "breakableDefaultUnit" => false,
                ],
            ],
        ],
        [
            "name" => "Yaourt" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/1047/1047510.png",
            "ingredients" => [
                [
                    "name" => "Perle de lait"
                ],
                [
                    "name" => "Pat patrouille"
                ],
                [
                    "name" => "La laitière"
                ],
                [
                    "name" => "Velouté"
                ],
                [
                    "name" => "Yaourt nature"
                ],
                [
                    "name" => "Compote en pot"
                ],
                [
                    "name" => "Compote à boire"
                ],
                [
                    "name" => "Compote"
                ],
            ],
        ],
        [
            "name" => "Gâteau" ,
            "image" => 'https://cdn-icons-png.flaticon.com/128/2435/2435678.png',
            "ingredients" => [
                [
                    "name" => "Figolu"
                ],
                [
                    "name" => "BN"
                ],
                [
                    "name" => "Chamonix"
                ],
                [
                    "name" => "Barquette chocolat"
                ],
                [
                    "name" => "Barquette fraise"
                ],
                [
                    "name" => "The LU"
                ],
                [
                    "name" => "Boudoire"
                ],
                [
                    "name" => "Biscuit cuillère"
                ],
                [
                    "name" => "Speculos"
                ],
            ],
        ],
        [
            "name" => "Bébé" ,
            "image" => "images/department/bebe.png",
            "ingredients" => [
                [
                    "name" => "Lait 1er âge"
                ],
                [
                    "name" => "Lait 2e âge"
                ],
                [
                    "name" => "Lait 3e âge"
                ],
                [
                    "name" => "Couche"
                ],
                [
                    "name" => "Lingette"
                ],
            ],
        ],
        [
            "name" => "Apéritif" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/3814/3814603.png",
            "ingredients" => [
                [
                    "name" => "Chips"
                ],
                [
                    "name" => "Cacahuète"
                ],
                [
                    "name" => "Chips ondulé"
                ],
                [
                    "name" => "Chips aux vinaigre"
                ],
                [
                    "name" => "Chipster"
                ],
                [
                    "name" => "Mini pizza"
                ],
                [
                    "name" => "Cone 3D"
                ],
                [
                    "name" => "Springle"
                ],
            ],
        ],
        [
            "name" => "Viande" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/1134/1134447.png",
            "ingredients" => [
                [
                    "name" => "Aiguilette de poulet"
                ],
                [
                    "name" => "Cuisse de poulet"
                ],
                [
                    "name" => "Steack"
                ],
                [
                    "name" => "Dinde"
                ],
                [
                    "name" => "Poulet"
                ],
                [
                    "name" => "Saumon"
                ],
                [
                    "name" => "Poisson"
                ],
                [
                    "name" => "Knacki"
                ],
                [
                    "name" => "Chorizzo"
                ],
                [
                    "name" => "Jambon cru"
                ],
                [
                    "name" => "Jambon blanc"
                ],
                [
                    "name" => "Bœuf"
                ],
                [
                    "name" => "Bœuf bourguignon"
                ],
                [
                    "name" => "Jambon"
                ],
                [
                    "name" => "Blanquette de veau"
                ],
                [
                    "name" => "Chair à saucisse"
                ],
                [
                    "name" => "Cote de porc"
                ],
                [
                    "name" => "Agneau"
                ],
                [
                    "name" => "Veau"
                ],
                [
                    "name" => "Saucisse"
                ],
                [
                    "name" => "Saucisson"
                ],
                [
                    "name" => "Saucisson fouet"
                ],
                [
                    "name" => "Saucisson st agaune"
                ],
                [
                    "name" => "Merguez"
                ],
                [
                    "name" => "Charcuterie"
                ],
                [
                    "name" => "Lardon"
                ]
            ],
        ],
        [
            "name" => "Alcool" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/920/920541.png",
            "ingredients" => [
                [
                    "name" => "Bière blonde"
                ],
                [
                    "name" => "Bière artisinale"
                ],
                [
                    "name" => "Vin blanc cuisine"
                ],
                [
                    "name" => "Vin blanc table"
                ],
                [
                    "name" => "Vin rouge cuisine"
                ],
                [
                    "name" => "Vin rouge table"
                ],
            ],
        ],
        [
            "name" => "Boisson" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/2405/2405597.png",
            "ingredients" => [
                [
                    "name" => "Schweps tonic"
                ],
                [
                    "name" => "Sirop fruit rouge"
                ],
                [
                    "name" => "Ice tea green"
                ],
            ],
        ],
        [
            "name" => "Surgelé" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/3082/3082004.png",
            "ingredients" => [
                [
                    "name" => "Steack haché"
                ],
                [
                    "name" => "Viande hachée"
                ],
                [
                    "name" => "Petit pois surgelé"
                ],
                [
                    "name" => "Épinard surgelé"
                ],
                [
                    "name" => "Framboise surgelée"
                ],
                [
                    "name" => "Nuggets"
                ],
                [
                    "name" => "Cordon bleu"
                ],
                [
                    "name" => "Frite"
                ],
            ],
        ],
        [
            "name" => "Conserve" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/2916/2916046.png",
            "ingredients" => [
                [
                    "name" => "Maïs"
                ],
                [
                    "name" => "Petit pois"
                ],
                [
                    "name" => "Petit pois carotte"
                ],
                [
                    "name" => "Haricot"
                ],
                [
                    "name" => "Olive"
                ],
                [
                    "name" => "Capre"
                ],
                [
                    "name" => "Olive verte"
                ],
                [
                    "name" => "Concentré de tomate"
                ],
                [
                    "name" => "Olive noir"
                ],
                [
                    "name" => "Gratin daufinois"
                ],
                [
                    "name" => "Confiture"
                ],
                [
                    "name" => "Nutella",
                    "image" => "https://cdn-icons-png.flaticon.com/64/135/135605.png"
                ],
                [
                    "name" => "Salade de Fruit"
                ],
                [
                    "name" => "Compote en bocal"
                ],
            ],
        ],
        [
            "name" => "Aide pâtissier",
            "image" => "https://cdn-icons-png.flaticon.com/128/992/992767.png",
            "ingredients" => [
                [
                    "name" => "Farine",
                    "defaultUnit" => "kilo",
                    "breakableDefaultUnit" => false,
                ],
                [
                    "name" => "Farine pain",
                ],
                [
                    "name" => "Farine brioche",
                ],
                [
                    "name" => "Sucre",
                ],
                [
                    "name" => "Maïzena",
                ],
                [
                    "name" => "Pépite de chocolat",
                ],
                [
                    "name" => "Gélatine",
                ],
                [
                    "name" => "Sucre roux",
                ],
                [
                    "name" => "Levure patissière",
                ],
                [
                    "name" => "Levure boulangère",
                ],
                [
                    "name" => "Vanille",
                ],
                [
                    "name" => "Chocolat",
                ],
                [
                    "name" => "Chocolat liquide",
                ],
                [
                    "name" => "Caramel",
                ],
                [
                    "name" => "Gélatine",
                ],
                [
                    "name" => "Agaragar",
                ],
                [
                    "name" => "Caramel",
                ],
                [
                    "name" => "Caramel liquide",
                ],
            ],
        ],
        [
            "name" => "Céréale" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/5009/5009812.png",
            "ingredients" => [
                [
                    "name" => "Riz",
                ],
                [
                    "name" => "Blé",
                ],
                [
                    "name" => "Boulgour",
                ],
                [
                    "name" => "Quinoa",
                ],
                [
                    "name" => "Lentille",
                ],
                [
                    "name" => "Risotto",
                ],
                [
                    "name" => "Boulgoure fin",
                ],
                [
                    "name" => "Nouille",
                ],
                [
                    "name" => "Pate",
                    "defaultUnit" => "kilo",
                ],
                [
                    "name" => "Pate lasagne",
                ],
                [
                    "name" => "Pate ramen",
                ],
                [
                    "name" => "Coquilette",
                ],
                [
                    "name" => "Spaguetti",
                ],
                [
                    "name" => "Nouille chinoise",
                ],
                [
                    "name" => "Soja",
                ],
                [
                    "name" => "Raviole",
                ],
                [
                    "name" => "Purée",
                ],
                [
                    "name" => "Vermicelle",
                ],
            ],
        ],
        [
            "name" => "Traiteur" ,
            "image_old" => "https://cdn-icons-png.flaticon.com/128/2674/2674064.png",
            "image" => "images/department/traiteur.png",
            "ingredients" => [
                [
                    "name" => "Pizza",
                ],
                [
                    "name" => "Soupe",
                ],
                [
                    "name" => "Galette",
                ],
                [
                    "name" => "Pate pizza",
                ],
                [
                    "name" => "Pate feuilletée",
                ],
                [
                    "name" => "Riste aubergine",
                ],
                [
                    "name" => "Pate brisée",
                ],
                [
                    "name" => "Pate sablée",
                ],
                [
                    "name" => "Gnocci",
                ],
                [
                    "name" => "Quenelle",
                ],
                [
                    "name" => "Hachis parmentier",
                ],
                [
                    "name" => "Lasagne",
                ],
                [
                    "name" => "Poisson pané",
                ],
                [
                    "name" => "Nem",
                ],
                [
                    "name" => "Bouillon",
                ],
                [
                    "name" => "Bouillon de bœuf",
                ],
                [
                    "name" => "Bouillon de légume",
                ],
            ],
        ],
        [
            "name" => "Produit ménager",
            "image" => "https://cdn-icons-png.flaticon.com/128/3899/3899392.png",
            "ingredients" => [
                [
                    "name" => "Sol",
                ],
                [
                    "name" => "Javel",
                ],
                [
                    "name" => "Vitre",
                ],
                [
                    "name" => "Bicarbonate",
                ],
                [
                    "name" => "Lingette",
                ],
            ],
        ],
        [
            "name" => "Boulangerie" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/3081/3081918.png",
            "ingredients" => [
                [
                    "name" => "Pain",
                ],
                [
                    "name" => "Pain de mie",
                ],
                [
                    "name" => "Pain panini",
                ],
                [
                    "name" => "Pain tartine",
                ],
                [
                    "name" => "Pain baggle",
                ],
                [
                    "name" => "Pain à burger",
                ],
                [
                    "name" => "Brioche",
                ],
                [
                    "name" => "Biscotte",
                ],
                [
                    "name" => "Cracotte",
                ],
                [
                    "name" => "Pain au lait",
                ],
            ],
        ],
        [
            "name" => "Sauce" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/3106/3106132.png",
            "ingredients" => [
                [
                    "name" => "Vinaigre",
                ],
                [
                    "name" => "Vinaigre balsamique",
                ],
                [
                    "name" => "Vinaigre xérès",
                ],
                [
                    "name" => "Huile",
                ],
                [
                    "name" => "Huile d'olive",
                ],
                [
                    "name" => "Béarnaise",
                ],
                [
                    "name" => "Ketchup",
                ],
                [
                    "name" => "Mayonnaise",
                ],
                [
                    "name" => "Bolognaise",
                ],
                [
                    "name" => "Sauce 4 fromages",
                ],
                [
                    "name" => "Pesto",
                ],
                [
                    "name" => "Tartare",
                ],
                [
                    "name" => "BBQ",
                ],
                [
                    "name" => "Sauce soja",
                ],
                [
                    "name" => "Sauce napolitaine",
                ],
                [
                    "name" => "Sauce tomate",
                ],
                [
                    "name" => "Sauce nuoc man",
                ],
            ],
        ],
        [
            "name" => "Animal",
            "image" => "https://cdn-icons-png.flaticon.com/128/2619/2619232.png",
            "ingredients" => [
                [
                    "name" => "Croquette",
                ],
                [
                    "name" => "Litière",
                ],
            ]
        ],
        [
            "name" => "Divers",
            "ingredients" => [
                [
                    "name" => "Œuf",
                    "defaultUnit" => "piece",
                ],
                [
                    "name" => "Lait",
                ],
                [
                    "name" => "Poivre",
                ],
                [
                    "name" => "Cornichon",
                ],
                [
                    "name" => "Chocolat en poudre",
                ],
                [
                    "name" => "Miel",
                ],
                [
                    "name" => "Sel",
                ],
                [
                    "name" => "Bouquet garni",
                ],
            ],
        ],
        [
            "name" => "Cuisine du monde",
            "image" => "https://cdn-icons-png.flaticon.com/128/1717/1717511.png",
            "ingredients" => [
                [
                    "name" => "Tortilla",
                ],
                [
                    "name" => "Feuille de brique",
                ],
                [
                    "name" => "Épice guacamole",
                ],
                [
                    "name" => "Épice viande",
                ],
                [
                    "name" => "Épice",
                ],
                [
                    "name" => "Curry",
                ],
                [
                    "name" => "Ramen",
                ],
            ],
        ],
    ];

    const RECIPES = [
        [
            "name" => "Pates carbonara",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "people" => 4,
            "ingredients" => [
                [
                    "ingredient" => "Pate",
                    "quantity" => 500,
                    "unit" => "gramme"
                ],
                [
                    "ingredient" => "Œuf",
                    "quantity" => 4,
                    "unit" => "piece"
                ],
                "Crème fraiche épaisse",
                "Lardon",
                "Parmesan"
            ]
        ],
        [
            "name" => "Fajitas",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Tomate cerise",
                "Maïs",
                "Crème fraiche épaisse",
                "Viande hachée",
                "Emmental rapé",
                "Avocat",
                "Ail",
                "Épice guacamole",
                "Épice viande",
                "Tortilla"
            ]
        ],
        [
            "name" => "Œufs à la coque",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Œuf",
                "Pain",
            ]
        ],
        [
            "name" => "Burger",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pain à burger",
                "Tomate",
                "Oignon rouge",
                "Cheddar en tranche",
                "Béarnaise",
                "Ketchup",
                "Mayonnaise",
                "Salade verte",
            ]
        ],
        [
            "name" => "Tarte tatin",
            "type" => Recipe::TYPE_DESSERT,
            "ingredients" => [
                "Beurre",
                "Pomme golden",
                "Pate feuilletée",
                "Sucre",
            ],
        ],
        [
            "name" => "Ramen",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Bœuf",
                "Pate ramen",
            ],
        ],
        [
            "name" => "Salade Caesar",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Aiguilette de poulet",
                "Salade verte",
                "Parmesan",
                "Pain",
            ],
        ],
        [
            "name" => "Gaspacho",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Tomate",
                "Poivron",
                "Concombre",
                "Melon",
                "Huile d'olive",
                "Vinaigre",
            ],
        ],
        [
            "name" => "Poulet thai",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Aiguilette de poulet",
                "Oignon",
                "Poivron",
                "Cacahuète",
                "Soja",
                "Huile",
                "Sucre",
                "Sauce soja",
                "Sauce nuoc man",
                "Caramel liquide",
            ],
        ],
        [
            "name" => "Gnocci",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Gnocci",
            ],
        ],
        [
            "name" => "Salade composée",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Riz",
                "Tomate",
                "Concombre",
                "Maïs",
                "Lardon",
            ],
        ],
        [
            "name" => "Raviole",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Raviole",
            ],
        ],
        [
            "name" => "Sauce Lentille",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Saucisse",
                "Lentille",
                "Oignon",
                "Carotte",
            ],
        ],
        [
            "name" => "Blé dinde",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Blé",
                "Dinde",
            ],
        ],
        [
            "name" => "Potage",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Vermicelle",
                "Poireau",
                "Bouillon",
            ],
        ],
        [
            "name" => "Gratin de pate",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pate",
                [
                    "ingredient" => "Beurre",
                    "quantity" => "30",
                    "unit" => "gramme",
                ],
                [
                    "ingredient" => "Farine",
                    "quantity" => "30",
                    "unit" => "gramme",
                ],
            ],
        ],
        [
            "name" => "Gratin de choux fleur",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Choux fleur",
                [
                    "ingredient" => "Beurre",
                    "quantity" => "30",
                    "unit" => "gramme",
                ],
                [
                    "ingredient" => "Farine",
                    "quantity" => "30",
                    "unit" => "gramme",
                ],
                "Lait",
                "Sel",
                "Poivre",
                "Emmental rapé",
                "Lardon",
            ],
        ],
        [
            "name" => "Gratin courgette",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Courgette",
                [
                    "ingredient" => "Beurre",
                    "quantity" => "30",
                    "unit" => "gramme",
                ],
                [
                    "ingredient" => "Farine",
                    "quantity" => "30",
                    "unit" => "gramme",
                ],
                "Lait",
                "Sel",
                "Poivre",
                "Emmental rapé",
                "Lardon",
            ],
        ],
        [
            "name" => "Lasagne",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pate lasagne",
                "Viande hachée",
                "Parmesan",
                "Beurre",
                "Farine",
                "Lait",
                "Sel",
                "Poivre",
                "Emmental rapé",
                "Sauce tomate",
            ],
        ],
        [
            "name" => "Quenelle",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Quenelle",
                [
                    "ingredient" => "Beurre",
                    "quantity" => "30",
                    "unit" => "gramme",
                ],
                [
                    "ingredient" => "Farine",
                    "quantity" => "30",
                    "unit" => "gramme",
                ],
                "Lait",
                "Sel",
                "Poivre",
                "Emmental rapé",
                "Sauce tomate",
                "Olive",
            ],
        ],
         [
            "name" => "Crumble de courgette",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Courgette",
                "Beurre",
                "Farine",
                "Poivre",
                "Sel",
                "Lardon",
                "Emmental rapé",
            ],
        ],
         [
            "name" => "Pizza",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pate pizza",
                "Sauce tomate",
                "Charcuterie",
                "Emmental rapé",
                "Mozzarella",
            ],
        ],
         [
            "name" => "Pizza big apple",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pate pizza",
                "Pomme",
                "Raclette",
                "Sauce napolitaine",
                "Lardon",
            ],
        ],
         [
            "name" => "Baggle",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pain baggle",
                "Fromage frais",
                "Charcuterie",
                "Salade",
            ],
        ],
         [
            "name" => "Woke",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Nouille chinoise",
                "Bœuf",
                "Soja",
                "Concombre",
                "Avocat",
                "Tomate",
                "Nem",
            ],
        ],
         [
            "name" => "Riz cantonais",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Riz",
                "Petit pois",
                "Œuf",
                "Lardon",
            ],
        ],
         [
            "name" => "Tomate farcie",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Tomate à farcir",
                "Courgette à farcir",
                "Poivron",
                "Chair à saucisse",
                "Pain de mie",
                "Œuf",
                "Huile d'olive",
                "Oignon",
                "Ail",
                "Riz",
                "Bouillon de bœuf",
            ],
        ],
         [
            "name" => "Omelette",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Œuf",
                "Emmental rapé",
            ],
        ],
         [
            "name" => "Œuf dur",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Œuf",
            ],
        ],
         [
            "name" => "Chili con carne",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Steack haché",
                "Haricot rouge",
                "Oignon",
                "Beurre",
                "Bouillon de bœuf",
                "Concentré de tomate",
                "Ail",
                "Épice",
                "Riz",
            ],
        ],
         [
            "name" => "Panini",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pain panini",
                "Cheddar en tranche",
                "Charcuterie",
                "Ketchup",
                "Béarnaise",
            ],
        ],
         [
            "name" => "Tartine",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pain tartine",
                "Ail",
                "Tomate",
                "Charcuterie",
                "Emmental rapé",
                "Mozzarella",
            ],
        ],
         [
            "name" => "Crepe",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Farine",
                "Sel",
                "Sucre",
                "Beurre",
                "Lait",
                "Œuf",
            ],
        ],
         [
            "name" => "Galette bretonne",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Galette",
                "Charcuterie",
                "Emmental rapé",
                "Œuf",
            ],
        ],
         [
            "name" => "Croque monsieur",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pain de mie",
                "Charcuterie",
                "Cheddar en tranche",
            ],
        ],
         [
            "name" => "Brique",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Feuille de brique",
                "Jambon cru",
                "Tomate",
                "Huile d'olive",
                "Chèvre",
                "Miel",
            ],
        ],
         [
            "name" => "Raclette",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Raclette",
                "Charcuterie",
                "Pomme de terre",
                "Cornichon",
            ],
        ],
         [
            "name" => "Fondue",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Fromage fondue",
                "Vin blanc cuisine",
                "Pain",
            ],
        ],
         [
            "name" => "Soupe",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Soupe",
            ],
        ],
         [
            "name" => "Endive au jambon",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Endive",
                "Jambon blanc",
                "Beurre",
                "Farine",
                "Lait",
                "Sel",
                "Poivre",
                "Emmental rapé",
            ],
        ],
         [
            "name" => "Wrap",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Tortilla",
                "Poulet",
                "Cheddar en tranche",
                "Salade",
            ],
        ],
         [
            "name" => "Tartare",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Viande hachée",
                "Échalotte",
                "Capre",
                "Cornichon",
            ],
        ],
         [
            "name" => "Terrine aubergine",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Riste aubergine",
                "Œuf",
                "Sel",
                "Poivre",
                "Crème fraiche épaisse",
            ],
        ],
         [
            "name" => "Taboulet syrien",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Boulgoure fin",
                "Tomate",
                "Salade verte",
                "Huile d'olive",
                "Citron",
                "Persil",
                "Oignon",
            ],
        ],
         [
            "name" => "Poulet basquaise",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Poulet",
                "Oignon",
                "Tomate",
                "Poivron",
                "Ail",
                "Huile d'olive",
                "Bouquet garni",
            ],
        ],
         [
            "name" => "Tarte mozza",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pate feuilletée",
                "Mozzarella",
                "Tomate",
                "Oignon rouge",
            ],
        ],
         [
            "name" => "Moussaka",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Aubergine",
                "Courgette",
                "Tomate",
                "Ail",
                "Concentré de tomate",
                "Huile d'olive",
                "Viande hachée",
                "Oignon",
                "Farine",
                "Beurre",
                "Lait",
                "Sel",
                "Poivre",
                "Emmental rapé",
            ],
        ],
         [
            "name" => "Tourte épinard",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pate feuilletée",
                "Pate feuilletée",
                "Épinard",
                "Crème fraiche liquide",
                "Saumon",
            ],
        ],
         [
            "name" => "Tartiflette",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pomme de terre",
                "Reblochon",
                "Oignon",
                "Crème fraiche épaisse",
                "Lardon",
            ],
        ],
         [
            "name" => "Flamenkuche",
             "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pate feuilletée",
                "Lardon",
                "Crème fraiche épaisse",
                "Oignon",
            ],
        ],
        [
            "name" => "Blanquette de veau",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Bouillon de légume",
                "Carotte",
                "Champignon",
                "Citron",
                "Farine",
                "Blanquette de veau",
                "Oignon",
                "Crème fraiche épaisse",
                "Vin blanc cuisine",
            ],
        ],
        [
            "name" => "Bœuf bourguignon",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Bœuf bourguignon",
                "Lardon",
                "Oignon",
                "Champignon",
                "Ail",
                "Farine",
                "Bouquet garni",
                "Beurre",
                "Vin rouge cuisine",
            ],
        ],
        [
            "name" => "Poulet indien",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Poulet",
                "Riz",
                "Curry",
                "Huile d'olive",
                "Tomate",
                "Concombre",
                "Carotte",
                "Cacahuète",
                "Vinaigre balsamique",
            ],
        ],
        [
            "name" => "Pate bolognaise",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pate",
                "Bolognaise",
            ],
        ],
        [
            "name" => "Pate pesto",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pate",
                "Pesto",
            ],
        ],
        [
            "name" => "Saucisse purée",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pomme de terre",
                "Saucisse",
                "Beurre",
                "Lait",
            ],
        ],
        [
            "name" => "Petit pois poisson",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Petit pois surgelé",
                "Poisson pané",
                "Carotte",
                "Pomme de terre",
                "Bouillon",
                "Lardon",
            ],
        ],
        [
            "name" => "Nuggets fritte",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Nuggets",
                "Frite",
            ],
        ],
        [
            "name" => "Légume cordon bleu",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Haricot",
                "Pomme de terre",
                "Cordon bleu",
            ],
        ],
        [
            "name" => "Risotto",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Risotto",
                "Chorizzo",
                "Beurre",
                "Vin blanc cuisine",
                "Parmesan",
            ],
        ],
        [
            "name" => "Saumon papillotte",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Saumon",
                "Poivron",
                "Tomate",
                "Huile d'olive",
                "Citron",
                "Riz",
                "Haricot",
            ],
        ],
        [
            "name" => "Tarte au pomme",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pate sablée",
                "Pomme",
                "Compote",
            ],
        ],
        [
            "name" => "Charlotte framboise",
            "type" => Recipe::TYPE_DESSERT,
            "ingredients" => [
                "Biscuit cuillère",
                "Framboise surgelée",
                "Sirop fruit rouge",
                "Citron",
                "Sucre",
                "Mascarpone",
                "Crème fraiche épaisse",
                "Gélatine",
            ],
        ],
        [
            "name" => "Moelleux chocolat",
            "type" => Recipe::TYPE_DESSERT,
            "ingredients" => [
                "Sucre",
                "Farine",
                "Chocolat",
                "Beurre",
                "Œuf",
                "Levure patissière",
            ],
        ],
        [
            "name" => "Gateau yaourt",
            "type" => Recipe::TYPE_DESSERT,
            "ingredients" => [
                "Farine",
                "Sucre",
                "Œuf",
                "Yaourt nature",
                "Citron",
                "Huile",
                "Levure patissière",
            ],
        ],
        [
            "name" => "Cookies",
            "type" => Recipe::TYPE_DESSERT,
            "ingredients" => [
                "Farine",
                "Maïzena",
                "Sucre",
                "Sel",
                "Vanille",
                "Pépite de chocolat",
                "Beurre",
                "Œuf",
            ],
        ],
        [
            "name" => "Muffin pépitte chocolat",
            "type" => Recipe::TYPE_DESSERT,
            "ingredients" => [
                "Farine",
                "Sucre",
                "Lait",
                "Vanille",
                "Pépite de chocolat",
                "Œuf",
                "Beurre",
                "Nutella",
            ],
        ],
        [
            "name" => "Bananabread",
            "type" => Recipe::TYPE_DESSERT,
            "ingredients" => [
                "Farine",
                "Sucre",
                "Levure patissière",
                "Bicarbonate",
                "Sel",
                "Banane",
                "Lait",
                "Beurre",
                "Œuf",
            ],
        ],
        [
            "name" => "Sablé",
            "type" => Recipe::TYPE_DESSERT,
            "ingredients" => [
                "Beurre",
                "Sucre",
                "Œuf",
                "Farine",
            ],
        ],
        [
            "name" => "Marbré",
            "type" => Recipe::TYPE_DESSERT,
            "ingredients" => [
                "Beurre",
                "Œuf",
                "Sucre",
                "Crème fraiche liquide",
                "Farine",
                "Levure patissière",
                "Vanille",
                "Chocolat en poudre",
            ],
        ],
        [
            "name" => "Tiramisu citron",
            "type" => Recipe::TYPE_DESSERT,
            "ingredients" => [
                "Sucre",
                "Citron",
                "Biscuit cuillère",
                "Œuf",
                "Mascarpone",
            ],
        ],
    ];

    private $ingredients = [];
    private $recipes = [];
    private $units = [];

    public function __construct(private SluggerInterface $slugger)
    {
    }


    public function load(ObjectManager $manager)
    {
        $faker = Factory::create("fr_FR");
        $faker->addProvider(new \Bluemmb\Faker\PicsumPhotosProvider($faker));

        $this->loadUnits($manager);

        $this->loadConversions($manager);

        $this->loadIngredients($manager);

        $this->loadSpecificConvertion($manager);

        $this->loadRecipes($manager);

        $shoppingList = new ShoppingList();
        $shoppingList->setDate(new \DateTime("25.10.2021"));
        $shoppingList->setLocked(false);
        $shoppingListRows = [];
        foreach ($this->recipes as $recipe) {
            if ($faker->boolean(0)) {
                $shoppingList->addRecipe($recipe);
                foreach ($recipe->getIngredients() as $ingredient) {
                    if (array_key_exists($ingredient->getName(), $shoppingListRows)) {
                        $shoppingListRow = ($shoppingListRows[$ingredient->getName()]);
                        $shoppingListRow->setNumberOfPresence($shoppingListRow->getNumberOfPresence() + 1);
                    } else {
                        $shoppingListRow = new ShoppingListRow();
                        $shoppingListRow->setIngredient($ingredient);
                        $shoppingListRow->setShoppinglist($shoppingList);
                        $shoppingListRow->setNumberOfPresence(1);
                        $shoppingListRow->setBought($faker->boolean(20));
                        $shoppingListRows[$ingredient->getName()] = $shoppingListRow;
                        $manager->persist($shoppingListRow);
                    }
                }
            }
        }
        $manager->persist($shoppingList);

        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     */
    private function loadUnits(ObjectManager $manager)
    {
        foreach (self::UNITS as $unitArray) {
            $unit = new Unit();
            $unit
                ->setName($unitArray["name"])
                ->setAbbreviation($unitArray["abbreviation"]);
            $this->units[$unit->getName()] = $unit;
            $manager->persist($unit);
        }
    }

    /**
     * @param ObjectManager $manager
     */
    private function loadConversions(ObjectManager $manager)
    {
        foreach (self::CONVERSIONS as $conversionArray) {
            $conversion = new Conversion();
            $conversion
                ->setStartUnit($this->units[$conversionArray["startUnit"]])
                ->setEndUnit($this->units[$conversionArray["endUnit"]])
                ->setCoefficient($conversionArray["coefficient"])
                ->setIntercept($conversionArray["intercept"] ?? 0);

            $manager->persist($conversion);
        }
    }

    /**
     * @param ObjectManager $manager
     */
    private function loadIngredients(ObjectManager $manager)
    {
        foreach (self::INGREDIENTS as $departmentArray) {

            $departmentImage = $departmentArray["image"] ?? null;
            $department = new Department();
            $department->setName($departmentArray["name"]);
            $department->setSlug(strtolower($this->slugger->slug($departmentArray["name"])));
            $department->setImage($departmentImage ?? "https://cdn-icons-png.flaticon.com/128/699/699044.png");
            $manager->persist($department);

            foreach ($departmentArray["ingredients"] as $ingredientArray) {
                if (array_key_exists("defaultUnit", $ingredientArray)) {
                    $ingredientDefaultUnit = $this->units[$ingredientArray["defaultUnit"]] ?? null;
                } else {
                    $ingredientDefaultUnit = null;
                }
                $ingredient = new Ingredient();
                $ingredient
                    ->setName($ingredientArray["name"])
                    ->setDepartment($department)
                    ->setDefaultUnit($ingredientDefaultUnit)
                    ->setBreakableDefaultUnit($ingredientArray["breakableDefaultUnit"] ?? true)
                    ->setSlug(strtolower($this->slugger->slug($ingredientArray["name"])))
                    ->setImage($ingredientArray["image"] ?? $department->getImage());
                $this->ingredients[$ingredientArray["name"]] = $ingredient;
                $manager->persist($ingredient);
            }
        }
    }

    /**
     * @param ObjectManager $manager
     */
    private function loadRecipes(ObjectManager $manager)
    {
        foreach (self::RECIPES as $recipeArray)
        {
            $recipe = new Recipe();
            $recipe
                ->setName($recipeArray["name"])
                ->setSlug(strtolower($this->slugger->slug($recipeArray["name"])))
                ->setType($recipeArray["type"]);
            foreach ($recipeArray["ingredients"] as $recipeRowArray) {
                if (is_array($recipeRowArray)) {
                    $ingredientName = $recipeRowArray["ingredient"];
                    $ingredientQuantity = $recipeRowArray["quantity"] ?? null;
                    $ingredientUnitName = $recipeRowArray["unit"] ?? "non exist";
                    $ingredientUnit = $this->units[$ingredientUnitName] ?? null;
                } else {
                    $ingredientName = $recipeRowArray;
                    $ingredientQuantity = null;
                    $ingredientUnit = null;
                }
                $recipeRow = new RecipeRow();
                $recipeRow
                    ->setIngredient($this->ingredients[$ingredientName])
                    ->setRecipe($recipe)
                    ->setQuantity($ingredientQuantity)
                    ->setUnit($ingredientUnit);
                $manager->persist($recipeRow);
            }
            $this->recipes[$recipeArray["name"]] = $recipe;
            $manager->persist($recipe);
        }
    }

    /**
     * @param ObjectManager $manager
     */
    private function loadSpecificConvertion(ObjectManager $manager)
    {
        foreach (self::SPECIFIC_CONVERSION as $conversionArray)
        {
            $specificConversion = new SpecificConversion();
            $specificConversion
                ->setIngredient($this->ingredients[$conversionArray["ingredient"]])
                ->setStartUnit($this->units[$conversionArray["startUnit"]])
                ->setEndUnit($this->units[$conversionArray["endUnit"]])
                ->setCoefficient($conversionArray["coefficient"] ?? 1)
                ->setIntercept($conversionArray["intercept"] ?? 0);

            $manager->persist($specificConversion);
        }
    }
}
