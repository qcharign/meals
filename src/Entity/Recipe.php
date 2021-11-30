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
     * @ORM\OneToMany(targetEntity=RecipeRow::class, mappedBy="recipe", orphanRemoval=true)
     */
    private $rows;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $peopleNumber;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="recipes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     * @ORM\ManyToOne(targetEntity=RecipeType::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

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

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getType(): ?RecipeType
    {
        return $this->type;
    }

    public function setType(?RecipeType $type): self
    {
        $this->type = $type;

        return $this;
    }
}
