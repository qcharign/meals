<?php

namespace App\Entity;

use App\Repository\SpecificConversionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecificConversionRepository::class)
 */
class SpecificConversion extends Conversion
{
    /**
     * @ORM\ManyToOne(targetEntity=Ingredient::class, inversedBy="conversions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ingredient;

    public function getIngredient(): ?Ingredient
    {
        return $this->ingredient;
    }

    public function setIngredient(?Ingredient $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }
}
