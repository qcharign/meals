<?php

namespace App\DataFixtures;

use App\Entity\Department;
use App\Entity\Ingredient;
use App\Entity\Recipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{

    const INGREDIENTS = [
        [
            "name" => "Fruit & Légume",
            "ingredients" => [
            "Aubergine",
            [
                "name" => "Avocat",
                "image" => "https://cdn-icons-png.flaticon.com/64/135/135609.png"
            ],
            "Bettrave",
            "Brocoli",
            "Carotte",
            "Chou",
            "Courge",
            "Concombre",
            "Endive",
            "Haricot",
            "Salade",
            "Salade verte",
            "Poivron",
            "Pomme de terre",
            "Betternut",
            "Epinard",
            "Champigon",
            "Poireau",
            "Oignon",
            "Oignon rouge",
            "Oignon blanc",
            "Petit pois",
            [
                "name" => "Tomate",
                "image" => "https://cdn-icons-png.flaticon.com/64/135/135702.png"
            ],
            "Courgette",
        ],
        ],
        [
            "name" => "Fromage" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/3753/3753482.png",
            "ingredients" => [
            "Emmental rapé",
            "Comté",
            "Parmesan",
            "Vache qui rit",
            "Kiri",
            "Raclette",
            "Fondue",
            "Mascarpone",
            "Fromage à Croc Monssieur",
            "Cheddar en tranche",
            "Crème fraiche entière épaisse",
            "Crème fraiche entière liquide",
            "Divers",
        ],
        ],
        [
            "name" => "Yaourt" ,
            "ingredients" => [
            "Perle de lait",
            "Pat patrouille",
            "La laitière",
            "Velouté",
            "Compote en pot",
            "Compote à boire",
            "Compote",
        ],
        ],
        [
            "name" => "Gâteau" ,
            "ingredients" => [
            "Figolu",
            "BN",
            "Chamonix",
            "Barquette chocolat",
            "Barquette fraise",
            "The LU",
            "Boudoire",
            "Speculos",
        ],
        ],
        [
            "name" => "Bébé" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/822/822174.png",
            "ingredients" => [
            "Lait",
            "Couche",
            "Lingette",
        ],
        ],
        [
            "name" => "Apéritif" ,
            "ingredients" => [
            "Chips",
            "Chips ondulé",
            "Chips aux vinaigre",
            "Chipster",
            "Mini pizza",
            "Cone 3D",
            "Springle",
        ],
        ],
        [
            "name" => "Viande" ,
            "ingredients" => [
            "Aiguilette de poulet",
            "Steack",
            "Dinde",
            "Poisson",
            "Jambon",
            "Cote de porc",
            "Agneau",
            "Veau",
            "Saucisse",
            "Merguez",
            "Charcuterie",
            "Lardon"
        ],
        ],
        [
            "name" => "Alcool" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/920/920541.png",
            "ingredients" => [
            "Bière blonde",
            "Bière artisinale",
            "Vin blanc cuisine",
            "Vin blanc table",
            "Vin rouge cuisine",
            "Vin rouge table",
        ],
        ],
        [
            "name" => "Boisson" ,
            "ingredients" => [
            "Schweps tonic",
            "Ice tea green",
        ],
        ],
        [
            "name" => "Surgelé" ,
            "ingredients" => [
            "Steack haché",
            "Viande hachée",
            "Epinard",
            "Nuggets",
            "Cordon bleu",
            "Frite",
        ],
        ],
        [
            "name" => "Conserve" ,
            "ingredients" => [
            "Maïs",
            "Petit pois",
            "Petit pois carotte",
            "Haricot",
            "Gratin daufinois",
            "Confiture",
            [
                "name" => "Nutella",
                "image" => "https://cdn-icons-png.flaticon.com/64/135/135605.png"
            ],
            "Salade de Fruit",
            "Compote en bocal",
        ],
        ],
        [
            "name" => "Aide pâtissier",
            "ingredients" => [
            "Farine",
            "Farine pain",
            "Farine brioche",
            "Sucre",
            "Sucre roux",
            "Levure patissière",
            "Levure boulangère",
            "Vanille",
            "Chocolat",
            "Chocolat liquide",
            "Caramel",
            "Gélatine",
            "Agaragar",
        ],
        ],
        [
            "name" => "Céréale" ,
            "ingredients" => [
            "Riz",
            "Blé",
            "Boulgour",
            "Quinoa",
            "Lentille",
            "Risotto",
            "Nouille",
            "Pate",
            "Raviole",
            "Purée",
        ],
        ],
        [
            "name" => "Traiteur" ,
            "ingredients" => [
            "Pate bolognaise",
            "Pate carbonara",
            "Pate pesto",
            "Gnocci"
        ],
        ],
        [
            "name" => "Produit ménager",
            "ingredients" => [
            "Sol",
            "Javel",
            "Vitre",
            "Lingette",
        ],
        ],
        [
            "name" => "Boulangerie" ,
            "ingredients" => [
            "Pain",
            "Pain de mie",
            "Pain à burger",
            "Brioche",
            "Biscotte",
            "Cracotte",
            "Pain au lait",
        ],
        ],
        [
            "name" => "Sauce" ,
            "ingredients" => [
            "Béarnaise",
            "Ketchup",
            "Mayonnaise",
            "Tartare",
            "BBQ",
        ],
        ],
        [
            "name" => "Animal",
            "image" => "https://cdn-icons-png.flaticon.com/128/2619/2619232.png",
            "ingredients" => [
                "Croquette",
                "Litière",
            ]
        ],
        [
            "name" => "Divers",
            "ingredients" => [
            "Œuf"
        ],
        ],
        [
            "name" => "Cuisine du monde",
            "ingredients" => [
            "Tortilla",
            "Ramen",
        ],
        ],
    ];

    const RECIPES = [
        [
            "name" => "Pates carbonara",
            "ingredients" => [
                "Pate",
                "Œuf",
                "Crème fraiche entière épaisse",
                "Lardon",
                "Parmesan"
            ]
        ],
        [
            "name" => "Fajitas",
            "ingredients" => [
                "Tomate",
                "Maïs",
                "Crème fraiche entière épaisse",
                "Viande hachée",
                "Emmental rapé",
                "Avocat",
                "Tortilla"
            ]
        ],
        [
            "name" => "Œufs à la coque",
            "ingredients" => [
                "Œuf",
                "Pain",
            ]
        ],
        [
            "name" => "Burger",
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
        ]
    ];


    public function __construct(private SluggerInterface $slugger)
    {
    }


    public function load(ObjectManager $manager)
    {
        $faker = Factory::create("fr_FR");
        $faker->addProvider(new \Bluemmb\Faker\PicsumPhotosProvider($faker));

        foreach (self::INGREDIENTS as $key => $departmentArray) {
            $departmentName = $departmentArray["name"];
            $departmentImage = $departmentArray["image"] ?? null;
            $departmentIngredients = $departmentArray["ingredients"];
            $department = new Department();
            $department->setName($departmentName);
            $department->setSlug(strtolower($this->slugger->slug($departmentName)));
            if ($departmentImage !== null) {
                $department->setImage($departmentImage);
            }
            $manager->persist($department);
            foreach ($departmentIngredients as $ingredientArray) {
                if (is_array($ingredientArray)) {
                    $ingredientName = $ingredientArray["name"] ?? "Unknown";
                    $ingredientImage = $ingredientArray["image"] ?? $faker->imageUrl(64, 64, true);
                } else {
                    $ingredientName = $ingredientArray;
                    $ingredientImage = $faker->imageUrl(64, 64, true);
                }
                $ingredient = new Ingredient();
                $ingredient->setName($ingredientName);
                $ingredient->setDepartment($department);
                $ingredient->setSlug(strtolower($this->slugger->slug($ingredientName)));
                $ingredient->setImage($ingredientImage);
                $manager->persist($ingredient);
            }
        }

        $manager->flush();

        foreach (self::RECIPES as $recipeArray)
        {
            $recipe = new Recipe();
            $recipe->setName($recipeArray["name"]);
            $recipe->setSlug(strtolower($this->slugger->slug($recipeArray["name"])));
            foreach ($recipeArray["ingredients"] as $ingredientName) {
                $ingredientRepository = $manager->getRepository(Ingredient::class);
                $ingredient = $ingredientRepository->findOneBy(["name" => $ingredientName]);
                $recipe->addIngredient($ingredient);
            }
            $manager->persist($recipe);
        }

        $manager->flush();
    }
}
