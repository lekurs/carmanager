<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\ExpandedPrestation;

interface ExpandedPrestationFactoryInterface
{
    /**
     * @param string $name
     * @param int $price
     * @return ExpandedPrestation
     */
    public function create(string $name, int $price): ExpandedPrestation;
}
