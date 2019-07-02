<?php


namespace App\Domain\DTO\Parameters;


use App\Domain\DTO\Interfaces\GarageEditDTOInterface;
use App\Domain\Models\Brand;
use App\Domain\Models\Plaque;

class GarageEditDTO implements GarageEditDTOInterface
{
    public $code;

    public $name;

    public $brand;

    public $plaque;

    /**
     * GarageEditDTO constructor.
     *
     * @param $code
     * @param $name
     * @param $brand
     * @param $plaque
     */
    public function __construct(
        string $code,
        string $name,
        Brand $brand = null,
        Plaque $plaque = null
    ) {
        $this->code = $code;
        $this->name = $name;
        $this->brand = $brand;
        $this->plaque = $plaque;
    }
}
