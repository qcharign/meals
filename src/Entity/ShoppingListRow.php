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
     * @ORM\Column(type="boolean")
     */
    private $bought;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $quantity;

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

    public function getBought(): ?bool
    {
        return $this->bought;
    }

    public function setBought(bool $bought): self
    {
        $this->bought = $bought;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function addQuantity(?float $quantity): self
    {
        if (is_null($this->quantity) || is_null($quantity)) {
            $this->quantity = null;
        } else {
            $this->quantity += $quantity;
        }

        return $this;
    }

    public function setQuantity(?float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
