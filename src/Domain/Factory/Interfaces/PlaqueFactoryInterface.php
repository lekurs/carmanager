<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Plaque;
use App\Domain\Models\Zone;

interface PlaqueFactoryInterface
{
    /**
     * @param string $name
     * @param Zone|null $zone
     * @return Plaque
     */
    public function create(string $name, Zone $zone = null): Plaque;
}
