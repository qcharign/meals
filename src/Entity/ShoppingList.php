<?php

namespace App\Entity;

use App\Repository\ShoppingListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShoppingListRepository::class)
 */
class ShoppingList
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=ShoppingListRow::class, mappedBy="shoppinglist", orphanRemoval=true)
     */
    private $rows;

    /**
     * @ORM\ManyToMany(targetEntity=Recipe::class, inversedBy="shoppingLists")
     */
    private $recipes;

    /**
     * @ORM\Column(type="boolean")
     */
    private $locked;

    public function __construct()
    {
        $this->rows = new ArrayCollection();
        $this->recipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|ShoppingListRow[]
     */
    public function getRows(): Collection
    {
        return $this->rows;
    }

    public function addRow(ShoppingListRow $row): self
    {
        if (!$this->rows->contains($row)) {
            $this->rows[] = $row;
            $row->setShoppinglist($this);
        }

        return $this;
    }

    public function removeRow(ShoppingListRow $row): self
    {
        if ($this->rows->removeElement($row)) {
            // set the owning side to null (unless already changed)
            if ($row->getShoppinglist() === $this) {
                $row->setShoppinglist(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Recipe[]
     */
    public function getRecipes(): Collection
    {
        return $this->recipes;
    }

    public function addRecipe(Recipe $recipe): self
    {
        if (!$this->recipes->contains($recipe)) {
            $this->recipes[] = $recipe;
        }

        return $this;
    }

    public function removeRecipe(Recipe $recipe): self
    {
        $this->recipes->removeElement($recipe);

        return $this;
    }

    public function getLocked(): ?bool
    {
        return $this->locked;
    }

    public function setLocked(bool $locked): self
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * @param Ingredient $ingredient
     * @return ShoppingListRow|null
     */
    public function rowWithIngredient(Ingredient $ingredient): ?ShoppingListRow
    {
        foreach ($this->getRows() as $row) {
            if ($row->getIngredient() === $ingredient)
                return $row;
        }
        return null;
    }

    /**
     * @param string $type
     * @return int
     */
    public function typeNumber(string $type): int
    {
        $typeRecipes = $this->recipes->filter(fn(Recipe $recipe) => $recipe->getType() === $type);
        return $typeRecipes->count();
    }
}
