<?php

namespace App\Controller;

use App\Entity\ShoppingList;
use App\Entity\ShoppingListRow;
use App\Repository\IngredientRepository;
use App\Repository\RecipeRepository;
use App\Repository\ShoppingListRepository;
use App\Repository\ShoppingListRowRepository;
use App\Service\ShoppingListService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShoppingListController extends BaseController
{
    #[Route('/shopping-list', name: 'shopping_list_index')]
    public function index(): Response
    {
        return $this->render('shopping_list/index.html.twig', [
            'controller_name' => 'ShoppingListController',
        ]);
    }

    #[Route('/shopping-list/create', name: 'shopping_list_create')]
    public function create(ShoppingListRepository $shoppingListRepository, EntityManagerInterface $manager): Response
    {
        $shoppingListUnLocked = $shoppingListRepository->findOneBy(["locked" => false]);
        $shoppingListUnLocked?->setLocked(true);

        $shoppingList = new ShoppingList();
        $shoppingList
            ->setDate(new \DateTime())
            ->setLocked(false);
        $manager->persist($shoppingList);
        $manager->flush();

        return $this->redirectToRoute('shopping_list_show', [
            "id" => $shoppingList->getId()
        ]);
    }

    #[Route('/shopping-list/{id}/show', name: 'shopping_list_show')]
    public function show($id, ShoppingListRepository $shoppingListRepository): Response
    {
        $shoppingList = $shoppingListRepository->find($id);

        return $this->render('shopping_list/show.html.twig', [
            "shoppingList" => $shoppingList
        ]);
    }

    #[Route('/shopping-list/add/recipe/{id_recipe}', name: 'shopping_list_add_recipe')]
    public function addRecipe(
        Request $request,
        $id_recipe,
        ShoppingListRepository $shoppingListRepository,
        RecipeRepository $recipeRepository,
        ShoppingListService $shoppingListService,
        EntityManagerInterface $manager,
    ): Response {
        $shoppingList = $shoppingListRepository->findOneBy(["locked" => false], ["date" => "desc"]);

        if ($shoppingList === null) {
            $shoppingList = new ShoppingList();
            $shoppingList
                ->setLocked(false)
                ->setDate(new \DateTime());
            $manager->persist($shoppingList);
        }

        $recipe = $recipeRepository->find($id_recipe);

        $shoppingListService->shoppingListAddRecipe($shoppingList, $recipe);

        $manager->flush();

        if ($request->isXmlHttpRequest()) {
            return new JsonResponse([
                "alerts" => [
                    [
                        "status" => "success",
                        "message" => $recipe->getName()." à été ajouté à la liste.",
                    ]
                ]
            ]);
        } else {
            return $this->redirectToRoute("recipe_index");
        }
    }

    #[Route('/shopping-list/remove/recipe/{id_recipe}', name: 'shopping_list_remove_recipe')]
    public function removeRecipe(
        Request $request,
        $id_recipe,
        ShoppingListRepository $shoppingListRepository,
        RecipeRepository $recipeRepository,
        ShoppingListService $shoppingListService,
        EntityManagerInterface $manager,
    ): Response {
        $shoppingList = $shoppingListRepository->findOneBy(["locked" => false], ["date" => "desc"]);

        if ($shoppingList === null) {
            $shoppingList = new ShoppingList();
            $shoppingList
                ->setLocked(false)
                ->setDate(new \DateTime());
            $manager->persist($shoppingList);
        }

        $recipe = $recipeRepository->find($id_recipe);

        $shoppingListService->shoppingListRemoveRecipe($shoppingList, $recipe);

        $manager->flush();

        if ($request->isXmlHttpRequest()) {
            return new JsonResponse([
                "alerts" => [
                    [
                        "status" => "success",
                        "message" => $recipe->getName()." à été enlevé de la liste.",
                    ]
                ]
            ]);
        } else {
            return $this->redirectToRoute("recipe_index");
        }
    }

    #[Route('/shopping-list/add/ingredient/{id_ingredient}', name: 'shopping_list_add_ingredient')]
    public function addIngredient(
        Request $request,
        $id_ingredient,
        ShoppingListRepository $shoppingListRepository,
        IngredientRepository $ingredientRepository,
        ShoppingListService $shoppingListService,
        EntityManagerInterface $manager,
    ): Response {
        $shoppingList = $shoppingListRepository->findOneBy(["locked" => false], ["date" => "desc"]);

        if ($shoppingList === null) {
            $shoppingList = new ShoppingList();
            $shoppingList
                ->setLocked(false)
                ->setDate(new \DateTime());
            $manager->persist($shoppingList);
        }

        $ingredient = $ingredientRepository->find($id_ingredient);

        $shoppingListService->shoppingListAddIngredient($shoppingList, $ingredient, false);
        $manager->flush();

        if ($request->isXmlHttpRequest()) {
            return new JsonResponse([
                "alerts" => [
                    [
                        "status" => "success",
                        "message" => $ingredient->getName()." ajouté avec succes.",
                    ]
                ]
            ]);
        } else {
            return $this->redirectToRoute("recipe_index");
        }
    }

     #[Route('/shopping-list/remove/ingredient/{id_ingredient}', name: 'shopping_list_remove_ingredient')]
    public function removeIngredient(
        Request $request,
        $id_ingredient,
        ShoppingListRepository $shoppingListRepository,
        IngredientRepository $ingredientRepository,
        ShoppingListService $shoppingListService,
        EntityManagerInterface $manager,
    ): Response {
        $shoppingList = $shoppingListRepository->findOneBy(["locked" => false], ["date" => "desc"]);

        if ($shoppingList === null) {
            $shoppingList = new ShoppingList();
            $shoppingList
                ->setLocked(false)
                ->setDate(new \DateTime());
            $manager->persist($shoppingList);
        }

        $ingredient = $ingredientRepository->find($id_ingredient);

        $shoppingListService->shoppingListRemoveIngredient($shoppingList, $ingredient, false);
        $manager->flush();

        if ($request->isXmlHttpRequest()) {
            return new JsonResponse([
                "alerts" => [
                    [
                        "status" => "success",
                        "message" => $ingredient->getName()." à été enlevé de la liste.",
                    ]
                ]
            ]);
        } else {
            return $this->redirectToRoute("recipe_index");
        }
    }

    #[Route('/shopping-list/row/{id}/bought/{isBought}', name: 'shopping_list_row_bought')]
    public function rowToggleBought($id, $isBought, ShoppingListRowRepository $shoppingListRowRepository, EntityManagerInterface $manager): Response
    {
        $shoppingListRow = $shoppingListRowRepository->find($id);

        $shoppingListRow->setBought($isBought === "1");

        $manager->flush();

        $html = $this->renderView("shopping_list/shared/_row.html.twig", ["row" => $shoppingListRow]);

        $jsonData = [];
        $jsonData["status"] = "success";
        $jsonData["views"] = [
            [
                "selector" => "#shopping_list_row_".$shoppingListRow->getId(),
                "html" => $html,
            ]
        ];
        return new JsonResponse($jsonData);
    }

    #[Route('/shopping-list/{id}/locked/{isLocked}', name: 'shopping_list_locked')]
    public function toggleLocked($id, $isLocked, ShoppingListRepository $shoppingListRepository, EntityManagerInterface $manager): Response
    {
        $isLocked = $isLocked === "1";
        if (!$isLocked) {
            $shoppingListActive = $shoppingListRepository->findOneBy(["locked" => false]);
            $shoppingListActive?->setLocked(true);
        }

        $shoppingList = $shoppingListRepository->find($id);
        $shoppingList->setLocked($isLocked);

        $manager->flush();

        $html = $this->renderView("shopping_list/shared/_switch_locked.html.twig", ["shoppingList" => $shoppingList]);

        $jsonData = [];
        $jsonData["status"] = "success";
        $jsonData["views"] = [
            [
                "selector" => "#switchShoppingListActiveGroup",
                "html" => $html,
            ]
        ];
        return new JsonResponse($jsonData);
    }
}
