<?php


namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\GarageCreationDTOInterface;
use App\Domain\Models\Brand;
use App\Domain\Models\Marque;
use App\Domain\Models\Plaque;

class GarageCreationDTO implements GarageCreationDTOInterface
{
    public $code;

    public $name;

    public $plaque;

    public $brand;

    /**
     * GarageCreationDTO constructor.
     * @param $code
     * @param $name
     * @param $plaque
     * @param $brand
     */
    public function __construct(string $code, string $name, Plaque $plaque = null, Brand $brand = null)
    {
        $this->code = $code;
        $this->name = $name;
        $this->plaque = $plaque;
        $this->brand = $brand;
    }
}
