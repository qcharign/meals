<?php

namespace App\Controller;

use App\Entity\Department;
use App\Entity\Ingredient;
use App\Form\IngredientType;
use \Exception;
use App\Service\IngredientService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IngredientController extends AbstractController
{
    #[Route('/ingredient', name: 'ingredient_index')]
    public function index(): Response
    {
        return $this->render('desktop/ingredient/index.html.twig', [
        ]);
    }

    #[Route('/ingredient/{slug}', name: 'ingredient_show', priority: -1)]
    public function show(): Response
    {
        return $this->render('desktop/ingredient/show.html.twig', [
        ]);
    }

    /**
     * @throws Exception
     */
    #[Route('/ingredient/create', name: 'ingredient_create')]
    public function create(
        ?Department $department,
        IngredientService $ingredientService,
        Request $request): Response
    {

        $form = $this->createForm(IngredientType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            /** @var Ingredient $ingredient */
            $ingredient = $form->getData();
            $ingredientService->save($ingredient);

            $this->redirectToRoute("ingredient_show", ["slug" => $ingredient->getSlug()]);
        }
        return $this->render('desktop/ingredient/create.html.twig', [
            "formView" => $form->createView(),
        ]);
    }

    #[Route('/ingredient/{id}/edit', name: 'ingredient_edit')]
    public function edit(
        $id,
        IngredientService $ingredientService,
        Request $request): Response
    {
        $ingredient = $ingredientService->findById($id);
        dump($ingredient);

        $form = $this->createForm(IngredientType::class);

        $form->setData($ingredient);

//        $form->handleRequest($request);
//
//        if ($form->isSubmitted()) {
//            /** @var Ingredient $ingredient */
//            $ingredient = $form->getData();
//            $ingredientService->save($ingredient);
//        }
        return $this->render('desktop/ingredient/edit.html.twig', [
            "formView" => $form->createView(),
        ]);
    }
}
