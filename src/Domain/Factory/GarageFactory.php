<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\GarageFactoryInterface;
use App\Domain\Models\Brand;
use App\Domain\Models\Garage;
use App\Domain\Models\Plaque;

final class GarageFactory implements GarageFactoryInterface
{
    public function create(string $name, string $slug, string $code = null, Plaque $plaque = null, Brand $brand = null): Garage
    {
        return new Garage($name, $slug, $code, $plaque, $brand);
    }
}