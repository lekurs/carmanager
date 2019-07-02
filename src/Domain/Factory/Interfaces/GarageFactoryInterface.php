<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Brand;
use App\Domain\Models\Garage;
use App\Domain\Models\Plaque;

interface GarageFactoryInterface
{
    /**
     * @param string $name
     * @param string $slug
     * @param string|null $code
     * @param Plaque|null $plaque
     * @param Brand|null $brand
     * @return Garage
     */
    public function create(string $name, string $slug, string $code = null, Plaque $plaque = null, Brand $brand = null): Garage;
}
