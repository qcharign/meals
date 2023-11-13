<?php

namespace App\Service;


use App\Entity\Ingredient;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class IngredientService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private SluggerInterface $slugger,
    ) {
    }

    public function save(Ingredient $ingredient)
    {
        $ingredient->setSlug($this->slugger->slug($ingredient->getName()));
        $this->entityManager->persist($ingredient);
        $this->entityManager->flush();
    }

    public function findById(int $id): ?Ingredient
    {
        $repository = $this->entityManager->getRepository(Ingredient::class);
        return $repository->find($id);
    }
}
