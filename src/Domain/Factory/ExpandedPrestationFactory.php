<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\ExpandedPrestationFactoryInterface;
use App\Domain\Models\ExpandedPrestation;

final class ExpandedPrestationFactory implements ExpandedPrestationFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(string $name, int $price): ExpandedPrestation
    {
        return new ExpandedPrestation($name, $price);
    }
}
