<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use App\Repository\ShoppingListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookletController extends AbstractController
{
    #[Route('/booklet', name: 'booklet_index')]
    public function booklet(RecipeRepository $recipeRepository, ShoppingListRepository $shoppingListRepository): Response
    {
        $recipes = $recipeRepository->findBy([], ["name" => "ASC"]);
        $shoppingList = $shoppingListRepository->findOneBy(["locked" => false]);
        return $this->render('desktop/booklet/index.html.twig', [
            "recipes" => $recipes,
            "shoppingList" => $shoppingList,
        ]);
    }
}
