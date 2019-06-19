<?php


namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\CarCreationDTOInterface;
use App\Domain\Models\Brand;

class CarCreationDTO implements CarCreationDTOInterface
{
    public $model;

    public $brand;

    /**
     * CarCreationDTO constructor.
     * @param $model
     * @param $brand
     */
    public function __construct(string $model, Brand $brand)
    {
        $this->model = $model;
        $this->brand = $brand;
    }
}
