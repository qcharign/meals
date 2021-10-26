<?php

namespace App\Service;


use App\Entity\Ingredient;
use App\Entity\Recipe;
use App\Entity\ShoppingList;
use App\Entity\ShoppingListRow;
use Doctrine\ORM\EntityManagerInterface;

class ShoppingListService
{
    public function __construct(private EntityManagerInterface $manager)
    {
    }

    /**
     * @param ShoppingList $shoppingList
     * @param Recipe       $recipe
     */
    public function shoppingListAddRecipe(ShoppingList $shoppingList, Recipe $recipe)
    {
        $shoppingList->addRecipe($recipe);
        foreach ($recipe->getIngredients() as $ingredient) {
            $this->shoppingListAddIngredient($shoppingList, $ingredient);
        }
    }

    /**
     * @param ShoppingList $shoppingList
     * @param Recipe       $recipe
     */
    public function shoppingListRemoveRecipe(ShoppingList $shoppingList, Recipe $recipe)
    {
        $shoppingList->removeRecipe($recipe);
        foreach ($recipe->getIngredients() as $ingredient) {
            $this->shoppingListRemoveIngredient($shoppingList, $ingredient);
        }
    }

    /**
     * @param ShoppingList $shoppingList
     * @param Ingredient   $ingredient
     * @param bool         $recipePresence
     */
    public function shoppingListAddIngredient(ShoppingList $shoppingList, Ingredient $ingredient, $recipePresence = true)
    {
        $shoppingListRow = $shoppingList->rowWithIngredient($ingredient);
        if ($shoppingListRow !== null) {
            $shoppingListRow->setNumberOfPresence($shoppingListRow->getNumberOfPresence() + ($recipePresence ? 1 : 0));
        } else {
            $shoppingListRow = new ShoppingListRow();
            $shoppingListRow
                ->setShoppinglist($shoppingList)
                ->setIngredient($ingredient)
                ->setBought(false)
                ->setNumberOfPresence( $recipePresence ? 1 : 0);
            $this->manager->persist($shoppingListRow);
        }
    }

    /**
     * @param ShoppingList $shoppingList
     * @param Ingredient   $ingredient
     * @param bool         $recipePresence
     */
    public function shoppingListRemoveIngredient(ShoppingList $shoppingList, Ingredient $ingredient, $recipePresence = true)
    {
        $shoppingListRow = $shoppingList->rowWithIngredient($ingredient);

        if ($shoppingListRow === null) {
            return ;
        }

        if ($recipePresence) {
            if ($shoppingListRow->getNumberOfPresence() <= 1) {
                $this->manager->remove($shoppingListRow);
            } else {
                $shoppingListRow->setNumberOfPresence($shoppingListRow->getNumberOfPresence() - 1);
            }
        } elseif ($shoppingListRow->getNumberOfPresence() === 0) {
            $this->manager->remove($shoppingListRow);
        }
    }
}
