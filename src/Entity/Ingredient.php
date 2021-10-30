<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 */
class Ingredient
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
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="ingredients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $department;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=ShoppingListRow::class, mappedBy="ingredient", orphanRemoval=true)
     */
    private $shoppingListRows;

    /**
     * @ORM\OneToMany(targetEntity=RecipeRow::class, mappedBy="ingredient", orphanRemoval=true)
     */
    private $recipeRows;

    /**
     * @ORM\ManyToOne(targetEntity=Unit::class)
     */
    private $defaultUnit;

    /**
     * @ORM\Column(type="boolean")
     */
    private $breakableDefaultUnit = true;

    /**
     * @ORM\OneToMany(targetEntity=SpecificConversion::class, mappedBy="ingredient", orphanRemoval=true)
     */
    private $conversions;

    public function __construct()
    {
        $this->shoppingListRows = new ArrayCollection();
        $this->recipeRows = new ArrayCollection();
        $this->conversions = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

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
     * @return Collection|ShoppingListRow[]
     */
    public function getShoppingListRows(): Collection
    {
        return $this->shoppingListRows;
    }

    public function addShoppingListRow(ShoppingListRow $shoppingListRow): self
    {
        if (!$this->shoppingListRows->contains($shoppingListRow)) {
            $this->shoppingListRows[] = $shoppingListRow;
            $shoppingListRow->setIngredient($this);
        }

        return $this;
    }

    public function removeShoppingListRow(ShoppingListRow $shoppingListRow): self
    {
        if ($this->shoppingListRows->removeElement($shoppingListRow)) {
            // set the owning side to null (unless already changed)
            if ($shoppingListRow->getIngredient() === $this) {
                $shoppingListRow->setIngredient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RecipeRow[]
     */
    public function getRecipeRows(): Collection
    {
        return $this->recipeRows;
    }

    public function addRecipeRow(RecipeRow $recipeRow): self
    {
        if (!$this->recipeRows->contains($recipeRow)) {
            $this->recipeRows[] = $recipeRow;
            $recipeRow->setIngredient($this);
        }

        return $this;
    }

    public function removeRecipeRow(RecipeRow $recipeRow): self
    {
        if ($this->recipeRows->removeElement($recipeRow)) {
            // set the owning side to null (unless already changed)
            if ($recipeRow->getIngredient() === $this) {
                $recipeRow->setIngredient(null);
            }
        }

        return $this;
    }

    public function getDefaultUnit(): ?Unit
    {
        return $this->defaultUnit;
    }

    public function setDefaultUnit(?Unit $defaultUnit): self
    {
        $this->defaultUnit = $defaultUnit;

        return $this;
    }

    public function getBreakableDefaultUnit(): ?bool
    {
        return $this->breakableDefaultUnit;
    }

    public function setBreakableDefaultUnit(bool $breakableDefaultUnit): self
    {
        $this->breakableDefaultUnit = $breakableDefaultUnit;

        return $this;
    }

    /**
     * @return Collection|SpecificConversion[]
     */
    public function getConversions(): Collection
    {
        return $this->conversions;
    }

    public function addConversion(SpecificConversion $conversion): self
    {
        if (!$this->conversions->contains($conversion)) {
            $this->conversions[] = $conversion;
            $conversion->setIngredient($this);
        }

        return $this;
    }

    public function removeConversion(SpecificConversion $conversion): self
    {
        if ($this->conversions->removeElement($conversion)) {
            // set the owning side to null (unless already changed)
            if ($conversion->getIngredient() === $this) {
                $conversion->setIngredient(null);
            }
        }

        return $this;
    }
}
