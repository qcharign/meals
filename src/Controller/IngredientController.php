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
        return $this->render('ingredient/index.html.twig', [
        ]);
    }

    #[Route('/ingredient/{slug}', name: 'ingredient_show')]
    public function show(): Response
    {
        return $this->render('ingredient/show.html.twig', [
        ]);
    }

    #[Route('/ingredient/create', name: 'ingredient_create')]
    public function create(?Department $department): Response
    {
        return $this->render('ingredient/create.html.twig', [
        ]);
    }
}
