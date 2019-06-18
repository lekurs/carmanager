<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Garage;
use App\Domain\Models\Marque;

interface GarageFactoryInterface
{
    public function create(string $name, string $slug, string $code = null, Marque $marque = null): Garage;
}