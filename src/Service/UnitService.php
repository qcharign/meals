<?php

namespace App\Service;


use App\Entity\Ingredient;
use App\Entity\Unit;
use App\Repository\ConversionRepository;
use Psr\Log\LoggerInterface;

class UnitService
{

    /**
     * @var ConversionRepository
     */
    private $conversionRepository;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(ConversionRepository $conversionRepository, LoggerInterface $logger)
    {
        $this->conversionRepository = $conversionRepository;
        $this->logger = $logger;
    }

    /**
     * @param float|null $quantity
     * @param Unit|null  $unit
     * @param Ingredient $ingredient
     * @return float|null
     */
    public function convertUnitForIngredient(?float $quantity, ?Unit $unit, Ingredient $ingredient): ?float
    {
        if (
            is_null($quantity)
            || is_null($unit)
            || is_null($ingredient->getDefaultUnit())
            || $unit === $ingredient->getDefaultUnit()
        ) {
            return $quantity;
        }

        foreach ($ingredient->getConversions() as $conversion)
        {
            if (
                $conversion->getStartUnit() === $unit
                && $conversion->getEndUnit() === $ingredient->getDefaultUnit()
            ) {
                return $quantity * $conversion->getCoefficient() + $conversion->getIntercept();
            }
        }

        foreach ($unit->getConversions() as $conversion)
        {
            if (
                $conversion->getStartUnit() === $unit
                && $conversion->getEndUnit() === $ingredient->getDefaultUnit()
            ) {
                return $quantity * $conversion->getCoefficient() + $conversion->getIntercept();
            }
        }

        $this->logger->error("Missing conversion for ".$ingredient->getName()." from '".$unit->getName()."' to '".$ingredient->getDefaultUnit()->getName()."'.");
        return $quantity;
    }
}
