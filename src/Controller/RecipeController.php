<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipeController extends AbstractController
{
    #[Route('/recipe', name: 'recipe_index')]
    public function index(RecipeRepository $recipeRepository): Response
    {
        $recipes = $recipeRepository->findBy([], ["name" => "ASC"]);
        return $this->render('recipe/index.html.twig', [
        ]);
    }


    #[Route('/recipe/{slug}', name: 'recipe_show')]
    public function show($slug, RecipeRepository $recipeRepository): Response
    {
        $recipe = $recipeRepository->findOneBy(["slug" => $slug]);
        return $this->render('recipe/show.html.twig', [
            "recipe" => $recipe
        ]);
    }

    #[Route('/recipe/create', name: 'recipe_create')]
    public function create($slug, RecipeRepository $recipeRepository): Response
    {
        $recipe = $recipeRepository->findOneBy(["slug" => $slug]);
        return $this->render('recipe/create.html.twig', [
            "recipe" => $recipe
        ]);
    }

    #[Route('/recipe/id/edit', name: 'recipe_edit')]
    public function edit($id, RecipeRepository $recipeRepository): Response
    {
        $recipe = $recipeRepository->find($id);
        return $this->render('recipe/edit.html.twig', [
            "recipe" => $recipe
        ]);
    }
}
