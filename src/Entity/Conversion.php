<?php

namespace App\Entity;

use App\Repository\ConversionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConversionRepository::class)
 */
class Conversion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Unit::class, inversedBy="conversions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $startUnit;

    /**
     * @ORM\ManyToOne(targetEntity=Unit::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $endUnit;

    /**
     * @ORM\Column(type="float")
     */
    private $coefficient = 0.;

    /**
     * @ORM\Column(type="float")
     */
    private $intercept = 0.;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartUnit(): ?Unit
    {
        return $this->startUnit;
    }

    public function setStartUnit(?Unit $startUnit): self
    {
        $this->startUnit = $startUnit;

        return $this;
    }

    public function getEndUnit(): ?Unit
    {
        return $this->endUnit;
    }

    public function setEndUnit(?Unit $endUnit): self
    {
        $this->endUnit = $endUnit;

        return $this;
    }

    public function getCoefficient(): ?float
    {
        return $this->coefficient;
    }

    public function setCoefficient(float $coefficient): self
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    public function getIntercept(): ?float
    {
        return $this->intercept;
    }

    public function setIntercept(float $intercept): self
    {
        $this->intercept = $intercept;

        return $this;
    }
}
