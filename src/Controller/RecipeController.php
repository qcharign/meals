<?php

namespace App\Controller;

use App\Entity\ShoppingList;
use App\Repository\RecipeRepository;
use App\Repository\ShoppingListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipeController extends AbstractController
{
    #[Route('/recipe', name: 'recipe_index')]
    public function index(RecipeRepository $recipeRepository, ShoppingListRepository $shoppingListRepository): Response
    {
        $recipes = $recipeRepository->findBy([], ["name" => "ASC"]);
        $shoppingList = $shoppingListRepository->findOneBy(["locked" => false]);
        return $this->render('desktop/recipe/index.html.twig', [
            "recipes" => $recipes,
            "shoppingList" => $shoppingList,
        ]);
    }


    #[Route('/recipe/{slug}', name: 'recipe_show')]
    public function show($slug, RecipeRepository $recipeRepository): Response
    {
        $recipe = $recipeRepository->findOneBy(["slug" => $slug]);
        return $this->render('desktop/recipe/show.html.twig', [
            "recipe" => $recipe
        ]);
    }

    #[Route('/recipe/create', name: 'recipe_create')]
    public function create($slug, RecipeRepository $recipeRepository): Response
    {
        $recipe = $recipeRepository->findOneBy(["slug" => $slug]);
        return $this->render('desktop/recipe/create.html.twig', [
            "recipe" => $recipe
        ]);
    }

    #[Route('/recipe/id/edit', name: 'recipe_edit')]
    public function edit($id, RecipeRepository $recipeRepository): Response
    {
        $recipe = $recipeRepository->find($id);
        return $this->render('desktop/recipe/edit.html.twig', [
            "recipe" => $recipe
        ]);
    }
}
