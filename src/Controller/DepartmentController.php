<?php

namespace App\Controller;

use App\Repository\DepartmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepartmentController extends AbstractController
{
    #[Route('/department', name: 'department_index')]
    public function index(): Response
    {
        return $this->render('department/index.html.twig', [
            'controller_name' => 'DepartmentController',
        ]);
    }

    #[Route('/department/{slug}', name: 'department_show')]
    public function show($slug, DepartmentRepository $departmentRepository): Response
    {
        $department = $departmentRepository->findOneBy(["slug" => $slug]);

        if ($department === null) {
            throw $this->createNotFoundException("Le rayon n'existe pas.");
        }

        return $this->render('department/show.html.twig', [
            "department" => $department
        ]);
    }
}
