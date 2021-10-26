<?php

namespace App\Entity;

use App\Repository\ShoppingListRowRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShoppingListRowRepository::class)
 */
class ShoppingListRow
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ShoppingList::class, inversedBy="rows")
     * @ORM\JoinColumn(nullable=false)
     */
    private $shoppinglist;

    /**
     * @ORM\ManyToOne(targetEntity=Ingredient::class, inversedBy="shoppingListRows")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ingredient;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberOfPresence;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bought;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShoppinglist(): ?ShoppingList
    {
        return $this->shoppinglist;
    }

    public function setShoppinglist(?ShoppingList $shoppinglist): self
    {
        $this->shoppinglist = $shoppinglist;

        return $this;
    }

    public function getIngredient(): ?Ingredient
    {
        return $this->ingredient;
    }

    public function setIngredient(?Ingredient $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getNumberOfPresence(): ?int
    {
        return $this->numberOfPresence;
    }

    public function setNumberOfPresence(int $numberOfPresence): self
    {
        $this->numberOfPresence = $numberOfPresence;

        return $this;
    }

    public function getBought(): ?bool
    {
        return $this->bought;
    }

    public function setBought(bool $bought): self
    {
        $this->bought = $bought;

        return $this;
    }
}
