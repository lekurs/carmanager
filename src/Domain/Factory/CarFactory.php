<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\CarFactoryInterface;
use App\Domain\Models\Brand;
use App\Domain\Models\Car;

final class CarFactory implements CarFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(string $model, Brand $brand): Car
    {
        return new Car($model, $brand);
    }
}
