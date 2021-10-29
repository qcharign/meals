<?php

namespace App\Service;


use App\Entity\Ingredient;
use App\Entity\Recipe;
use App\Entity\RecipeRow;
use App\Entity\ShoppingList;
use App\Entity\ShoppingListRow;
use Doctrine\ORM\EntityManagerInterface;

class ShoppingListService
{
    public function __construct(private EntityManagerInterface $manager, private UnitService $unitService)
    {
    }

    /**
     * @param ShoppingList $shoppingList
     * @param Recipe       $recipe
     */
    public function shoppingListAddRecipe(ShoppingList $shoppingList, Recipe $recipe)
    {
        $shoppingList->addRecipe($recipe);
        foreach ($recipe->getRows() as $row) {
            $quantity = $this->conversionRowUnit($row);
            $this->shoppingListAddIngredient($shoppingList, $row->getIngredient(), $quantity);
        }
    }

    /**
     * @param ShoppingList $shoppingList
     * @param Recipe       $recipe
     */
    public function shoppingListRemoveRecipe(ShoppingList $shoppingList, Recipe $recipe)
    {
        $shoppingList->removeRecipe($recipe);
        foreach ($recipe->getRows() as $row) {
            $quantity = $this->conversionRowUnit($row);
            $this->shoppingListRemoveIngredient($shoppingList, $row->getIngredient(), $quantity);
        }
    }

    /**
     * @param ShoppingList $shoppingList
     * @param Ingredient   $ingredient
     * @param float|null   $quantity
     */
    public function shoppingListAddIngredient(ShoppingList $shoppingList, Ingredient $ingredient, ?float $quantity)
    {
        $shoppingListRow = $shoppingList->rowWithIngredient($ingredient);
        if ($shoppingListRow !== null) {
            $shoppingListRow->addQuantity($quantity);
        } else {
            $shoppingListRow = new ShoppingListRow();
            $shoppingListRow
                ->setShoppinglist($shoppingList)
                ->setIngredient($ingredient)
                ->setBought(false)
                ->setQuantity($quantity);
            $this->manager->persist($shoppingListRow);
        }
    }

    /**
     * @param ShoppingList $shoppingList
     * @param Ingredient   $ingredient
     * @param float|null   $quantity
     */
    public function shoppingListRemoveIngredient(ShoppingList $shoppingList, Ingredient $ingredient, ?float $quantity)
    {
        $shoppingListRow = $shoppingList->rowWithIngredient($ingredient);

        if ($shoppingListRow === null) {
            return ;
        }

        if (is_null($quantity) || is_null($shoppingListRow->getQuantity())) {
            foreach ($shoppingList->getRecipes() as $recipe) {
                if ($recipe->hasIngredient($ingredient)) {
                    return;
                }
            }
            $this->manager->remove($shoppingListRow);
        } elseif ($quantity >= $shoppingListRow->getQuantity()) {
            $this->manager->remove($shoppingListRow);
        } else {
            $shoppingListRow->addQuantity(-$quantity);
        }
    }

    /**
     * @param RecipeRow $recipeRow
     * @return float|null
     */
    private function conversionRowUnit(RecipeRow $recipeRow)
    {
        return $this->unitService->convertUnitForIngredient($recipeRow->getQuantity(), $recipeRow->getUnit(), $recipeRow->getIngredient());
    }
}
