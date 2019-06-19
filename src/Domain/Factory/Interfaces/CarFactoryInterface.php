<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Brand;
use App\Domain\Models\Car;

interface CarFactoryInterface
{
    /**
     * @param string $model
     * @param Brand $brand
     * @return Car
     */
    public function create(string $model, Brand $brand): Car;
}
