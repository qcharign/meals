<?php

namespace App\Controller;

use App\Entity\Department;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

    #[Route('/ingredient/create', name: 'ingredient_create')]
    public function create(?Department $department): Response
    {
        return $this->render('desktop/ingredient/create.html.twig', [
        ]);
    }
}
