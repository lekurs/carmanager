<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\GarageFactoryInterface;
use App\Domain\Models\Garage;

class GarageFactory implements GarageFactoryInterface
{
    public function create(string $name, string $slug, string $code = null): Garage
    {
        return new Garage($name, $slug, $code);
    }
}