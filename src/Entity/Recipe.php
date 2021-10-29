<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecipeRepository::class)
 */
class Recipe
{
    const TYPE_STARTER = "starter";
    const TYPE_MAIN_COURSE = "main course";
    const TYPE_DESSERT = "dessert";

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity=ShoppingList::class, mappedBy="recipes")
     */
    private $shoppingLists;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=RecipeRow::class, mappedBy="recipe", orphanRemoval=true)
     */
    private $rows;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $peopleNumber;

    public function __construct()
    {
        $this->shoppingLists = new ArrayCollection();
        $this->rows = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection|ShoppingList[]
     */
    public function getShoppingLists(): Collection
    {
        return $this->shoppingLists;
    }

    public function addShoppingList(ShoppingList $shoppingList): self
    {
        if (!$this->shoppingLists->contains($shoppingList)) {
            $this->shoppingLists[] = $shoppingList;
            $shoppingList->addRecipe($this);
        }

        return $this;
    }

    public function removeShoppingList(ShoppingList $shoppingList): self
    {
        if ($this->shoppingLists->removeElement($shoppingList)) {
            $shoppingList->removeRecipe($this);
        }

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|RecipeRow[]
     */
    public function getRows(): Collection
    {
        return $this->rows;
    }

    public function addRow(RecipeRow $row): self
    {
        if (!$this->rows->contains($row)) {
            $this->rows[] = $row;
            $row->setRecipe($this);
        }

        return $this;
    }

    public function removeRow(RecipeRow $row): self
    {
        if ($this->rows->removeElement($row)) {
            // set the owning side to null (unless already changed)
            if ($row->getRecipe() === $this) {
                $row->setRecipe(null);
            }
        }

        return $this;
    }

    public function getPeopleNumber(): ?int
    {
        return $this->peopleNumber;
    }

    public function setPeopleNumber(?int $peopleNumber): self
    {
        $this->peopleNumber = $peopleNumber;

        return $this;
    }

    /**
     * @param Ingredient $ingredient
     * @return bool
     */
    public function hasIngredient(Ingredient $ingredient): bool
    {
        foreach ($this->getRows() as $row) {
            if ($row->getIngredient() === $ingredient) {
                return true;
            }
        }
        return false;
    }
}
