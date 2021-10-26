<?php

namespace App\DataFixtures;

use App\Entity\Department;
use App\Entity\Ingredient;
use App\Entity\Recipe;
use App\Entity\ShoppingList;
use App\Entity\ShoppingListRow;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{

    const INGREDIENTS = [
        [
            "name" => "Fruit & Légume",
            "image" => "https://cdn-icons-png.flaticon.com/128/1147/1147832.png",
            "ingredients" => [
            "Aubergine",
            "Ail",
            [
                "name" => "Avocat",
                "image" => "https://cdn-icons-png.flaticon.com/64/135/135609.png"
            ],
            "Bettrave",
            "Brocoli",
            "Banane",
            "Épinard",
            "Carotte",
            "Chou",
            "Courge",
            "Échalotte",
            "Concombre",
            "Champignon",
            "Haricot rouge",
            "Endive",
            "Haricot",
            "Salade",
            "Salade verte",
            "Poivron",
            "Pomme de terre",
            "Pomme",
            "Betternut",
            "Epinard",
            "Champigon",
            "Choux fleur",
            "Melon",
            "Poireau",
            "Citron",
            "Persil",
            "Oignon",
            "Oignon rouge",
            "Oignon blanc",
            "Petit pois",
            "Tomate cerise",
            "Tomate à farcir",
            "Courgette à farcir",
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
            "Raclette",
            "Vache qui rit",
            "Kiri",
            "Raclette",
            "Fromage fondue",
            "Mascarpone",
            "Reblochon",
            "Chèvre",
            "Fromage frais",
            "Mozzarella",
            "Fromage à Croc Monssieur",
            "Cheddar en tranche",
            "Crème fraiche épaisse",
            "Crème fraiche liquide",
            "Divers",
            "Beurre",
        ],
        ],
        [
            "name" => "Yaourt" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/1047/1047510.png",
            "ingredients" => [
            "Perle de lait",
            "Pat patrouille",
            "La laitière",
            "Velouté",
            "Yaourt nature",
            "Compote en pot",
            "Compote à boire",
            "Compote",
        ],
        ],
        [
            "name" => "Gâteau" ,
            "image" => 'https://cdn-icons-png.flaticon.com/128/2435/2435678.png',
            "ingredients" => [
            "Figolu",
            "BN",
            "Chamonix",
            "Barquette chocolat",
            "Barquette fraise",
            "The LU",
            "Boudoire",
            "Biscuit cuillère",
            "Speculos",
        ],
        ],
        [
            "name" => "Bébé" ,
            "image" => "images/department_baby.png",
            "ingredients" => [
            "Lait",
            "Couche",
            "Lingette",
        ],
        ],
        [
            "name" => "Apéritif" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/3814/3814603.png",
            "ingredients" => [
            "Chips",
            "Cacahuète",
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
            "image" => "https://cdn-icons-png.flaticon.com/128/1134/1134447.png",
            "ingredients" => [
            "Aiguilette de poulet",
            "Steack",
            "Dinde",
            "Poulet",
            "Saumon",
            "Poisson",
            "Chorizzo",
            "Jambon cru",
            "Jambon blanc",
            "Bœuf",
            "Bœuf bourguignon",
            "Jambon",
            "Blanquette de veau",
            "Chair à saucisse",
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
            "image" => "https://cdn-icons-png.flaticon.com/128/2405/2405597.png",
            "ingredients" => [
            "Schweps tonic",
            "Sirop fruit rouge",
            "Ice tea green",
        ],
        ],
        [
            "name" => "Surgelé" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/3082/3082004.png",
            "ingredients" => [
            "Steack haché",
            "Viande hachée",
            "Petit pois surgelé",
            "Épinard surgelé",
            "Framboise surgelée",
            "Nuggets",
            "Cordon bleu",
            "Frite",
        ],
        ],
        [
            "name" => "Conserve" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/2916/2916046.png",
            "ingredients" => [
            "Maïs",
            "Petit pois",
            "Petit pois carotte",
            "Haricot",
            "Olive",
            "Capre",
            "Olive verte",
            "Concentré de tomate",
            "Olive noir",
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
            "image" => "https://cdn-icons-png.flaticon.com/128/992/992767.png",
            "ingredients" => [
            "Farine",
            "Farine pain",
            "Farine brioche",
            "Sucre",
            "Maïzena",
            "Pépite de chocolat",
            "Gélatine",
            "Sucre roux",
            "Levure patissière",
            "Levure boulangère",
            "Vanille",
            "Chocolat",
            "Chocolat liquide",
            "Caramel",
            "Gélatine",
            "Agaragar",
            "Caramel",
            "Caramel liquide",
        ],
        ],
        [
            "name" => "Céréale" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/5009/5009812.png",
            "ingredients" => [
            "Riz",
            "Blé",
            "Boulgour",
            "Quinoa",
            "Lentille",
            "Risotto",
            "Boulgoure fin",
            "Nouille",
            "Pate",
            "Nouille chinoise",
            "Pate lasagne",
            "Soja",
            "Raviole",
            "Purée",
            "Vermicelle",
        ],
        ],
        [
            "name" => "Traiteur" ,
            "image_old" => "https://cdn-icons-png.flaticon.com/128/2674/2674064.png",
            "image" => "images/department_traiteur.png",
            "ingredients" => [
            "Pizza",
            "Soupe",
            "Galette",
            "Pate pizza",
            "Pate feuilletée",
            "Riste aubergine",
            "Pate brisée",
            "Pate sablée",
            "Gnocci",
            "Quenelle",
            "Hachis parmentier",
            "Lasagne",
            "Poisson pané",
            "Nem",
            "Bouillon",
            "Bouillon de bœuf",
            "Bouillon de légume",
        ],
        ],
        [
            "name" => "Produit ménager",
            "image" => "https://cdn-icons-png.flaticon.com/128/3899/3899392.png",
            "ingredients" => [
            "Sol",
            "Javel",
            "Vitre",
            "Bicarbonate",
            "Lingette",
        ],
        ],
        [
            "name" => "Boulangerie" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/3081/3081918.png",
            "ingredients" => [
            "Pain",
            "Pain de mie",
            "Pain panini",
            "Pain tartine",
            "Pain baggle",
            "Pain à burger",
            "Brioche",
            "Biscotte",
            "Cracotte",
            "Pain au lait",
        ],
        ],
        [
            "name" => "Sauce" ,
            "image" => "https://cdn-icons-png.flaticon.com/128/3106/3106132.png",
            "ingredients" => [
            "Vinaigre",
            "Vinaigre balsamique",
            "Vinaigre xérès",
            "Huile",
            "Huile d'olive",
            "Béarnaise",
            "Ketchup",
            "Mayonnaise",
            "Bolognaise",
            "4 fromages",
            "Pesto",
            "Tartare",
            "BBQ",
            "Sauce soja",
            "Sauce napolitaine",
            "Sauce tomate",
            "Sauce nuoc man",
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
                "Œuf",
                "Poivre",
                "Cornichon",
                "Chocolat en poudre",
                "Miel",
                "Sel",
                "Bouquet garni",
            ],
        ],
        [
            "name" => "Cuisine du monde",
            "image" => "https://cdn-icons-png.flaticon.com/128/1717/1717511.png",
            "ingredients" => [
                "Tortilla",
                "Feuille de brique",
                "Épice guacamole",
                "Épice viande",
                "Épice",
                "Curry",
                "Ramen",
            ],
        ],
    ];

    const RECIPES = [
        [
            "name" => "Pates carbonara",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Pate",
                "Œuf",
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
                "Beurre",
                "Farine",
            ],
        ],
        [
            "name" => "Gratin de choux fleur",
            "type" => Recipe::TYPE_MAIN_COURSE,
            "ingredients" => [
                "Choux fleur",
                "Beurre",
                "Farine",
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
                "Beurre",
                "Farine",
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
                "Beurre",
                "Farine",
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


    public function __construct(private SluggerInterface $slugger)
    {
    }


    public function load(ObjectManager $manager)
    {
        $faker = Factory::create("fr_FR");
        $faker->addProvider(new \Bluemmb\Faker\PicsumPhotosProvider($faker));

        $ingredients = [];
        $recipes = [];

        foreach (self::INGREDIENTS as $key => $departmentArray) {
            $departmentImage = $departmentArray["image"] ?? null;
            $department = new Department();
            $department->setName($departmentArray["name"]);
            $department->setSlug(strtolower($this->slugger->slug($departmentArray["name"])));
            if ($departmentImage !== null) {
                $department->setImage($departmentImage);
            }
            $manager->persist($department);
            foreach ($departmentArray["ingredients"] as $ingredientArray) {
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
                $ingredients[$ingredientName] = $ingredient;
                $manager->persist($ingredient);
            }
        }

        foreach (self::RECIPES as $recipeArray)
        {
            $recipe = new Recipe();
            $recipe
                ->setName($recipeArray["name"])
                ->setSlug(strtolower($this->slugger->slug($recipeArray["name"])))
                ->setType($recipeArray["type"]);
            foreach ($recipeArray["ingredients"] as $ingredientName) {
                $ingredient = $ingredients[$ingredientName];
                $recipe->addIngredient($ingredient);
            }
            $recipes[$recipeArray["name"]] = $recipe;
            $manager->persist($recipe);
        }

        $shoppingList = new ShoppingList();
        $shoppingList->setDate(new \DateTime("25.10.2021"));
        $shoppingList->setLocked(false);
        $shoppingListRows = [];
        foreach ($recipes as $recipe) {
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
}
