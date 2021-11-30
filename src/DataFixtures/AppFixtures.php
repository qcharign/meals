<?php

namespace App\DataFixtures;

use App\Entity\Conversion;
use App\Entity\Department;
use App\Entity\Ingredient;
use App\Entity\Recipe;
use App\Entity\RecipeRow;
use App\Entity\RecipeType;
use App\Entity\ShoppingList;
use App\Entity\ShoppingListRow;
use App\Entity\SpecificConversion;
use App\Entity\Unit;
use App\Entity\User;
use App\Repository\RecipeTypeRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    private $ingredients = [];
    private $departments = [];
    private $recipeTypes = [];
    private $recipes = [];
    private $units = [];
    private $users = [];
    private $faker;

    public function __construct(private SluggerInterface $slugger, private UserPasswordHasherInterface $hasher)
    {
        $this->faker = Factory::create("fr_FR");
        $this->faker->addProvider(new \Bluemmb\Faker\PicsumPhotosProvider($this->faker));
    }


    public function load(ObjectManager $manager)
    {

        $this->loadUsers($manager);

        $this->loadUnits($manager);

        $this->loadConversions($manager);

        $this->loadDepartments($manager);

        $this->loadIngredients($manager);

        $this->loadSpecificConversion($manager);

        $this->loadRecipeTypes($manager);

        $this->loadRecipes($manager);

        $shoppingList = new ShoppingList();
        $shoppingList->setDate(new \DateTime("25.10.2021"));
        $shoppingList->setLocked(false);
        $shoppingListRows = [];
        foreach ($this->recipes as $recipe) {
            if ($this->faker->boolean(0)) {
                $shoppingList->addRecipe($recipe);
                foreach ($recipe->getIngredients() as $ingredient) {
                    if (array_key_exists($ingredient->getName(), $shoppingListRows)) {
                        $shoppingListRow = ($shoppingListRows[$ingredient->getName()]);
                    } else {
                        $shoppingListRow = new ShoppingListRow();
                        $shoppingListRow->setIngredient($ingredient);
                        $shoppingListRow->setShoppinglist($shoppingList);
                        $shoppingListRow->setBought($this->faker->boolean(20));
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
        foreach (UnitFixture::UNITS as $unitArray) {
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
    private function loadRecipeTypes(ObjectManager $manager)
    {
        foreach (RecipeTypeFixture::RECIPE_TYPES as $recipeTypeArray) {
            $recipeType = new RecipeType();
            $recipeType
                ->setSequence($recipeTypeArray["sequence"])
                ->setName($recipeTypeArray["name"])
                ->setImage($recipeTypeArray["image"]);
            $this->recipeTypes[$recipeType->getName()] = $recipeType;
            $manager->persist($recipeType);
        }
    }

    /**
     * @param ObjectManager $manager
     */
    private function loadConversions(ObjectManager $manager)
    {
        foreach (ConversionFixture::CONVERSIONS as $conversionArray) {
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
        foreach (IngredientFixture::INGREDIENTS as $ingredient) {
            $department = $this->departments[$ingredient["department"]];
            $newIngredient = new Ingredient();
            $newIngredient
                ->setName($ingredient["name"])
                ->setDepartment($department)
                ->setDefaultUnit($this->units[($ingredient["defaultUnit"] ?? "not exist")] ?? null)
                ->setBreakableDefaultUnit($ingredient["breakableDefaultUnit"] ?? true)
                ->setSlug(strtolower($this->slugger->slug($ingredient["name"])))
                ->setImage($ingredient["image"] ?? $department->getImage());
            $this->ingredients[$ingredient["name"]] = $newIngredient;
            $manager->persist($newIngredient);
        }
    }

    /**
     * @param ObjectManager $manager
     */
    private function loadRecipes(ObjectManager $manager)
    {
        foreach (RecipeFixture::RECIPES as $recipeArray)
        {
            $recipe = new Recipe();
            $recipe
                ->setName($recipeArray["name"])
                ->setSlug(strtolower($this->slugger->slug($recipeArray["name"])))
                ->setType($this->recipeTypes[$recipeArray["type"]])
                ->setOwner($this->users[$recipeArray["owner"]]);
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

    private function loadDepartments(ObjectManager $manager)
    {
        foreach (DepartmentFixture::DEPARTMENTS as $department) {
            $newDepartment = new Department();
            $newDepartment
                ->setName($department["name"])
                ->setImage($department["image"])
                ->setSlug(strtolower($this->slugger->slug($department["name"])));

            $this->departments[$newDepartment->getName()] = $newDepartment;

            $manager->persist($newDepartment);
        }
    }


    /**
     * @param ObjectManager $manager
     */
    private function loadSpecificConversion(ObjectManager $manager)
    {
        foreach (SpecificConversionFixture::SPECIFIC_CONVERSION as $conversionArray)
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

    private function loadUsers(ObjectManager $manager)
    {
        foreach (UserFixture::USERS as $userArray) {
            $user = new User();
            $user
                ->setEmail($userArray["email"])
                ->setPassword($this->hasher->hashPassword($user, $userArray["password"]))
                ->setRoles($userArray["roles"])
                ->setFullName($userArray["fullname"]);

            $this->users[$userArray["email"]] = $user;
            $manager->persist($user);
        }
    }
}
