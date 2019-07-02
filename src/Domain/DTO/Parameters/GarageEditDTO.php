<?php


namespace App\Domain\DTO\Parameters;


use App\Domain\DTO\Interfaces\GarageEditDTOInterface;
use App\Domain\Models\Brand;
use App\Domain\Models\Plaque;

class GarageEditDTO implements GarageEditDTOInterface
{
    public $code;

    public $name;

    public $slug;

    public $brand;

    public $plaque;

    /**
     * GarageEditDTO constructor.
     *
     * @param $code
     * @param $name
     * @param $slug
     * @param $brand
     * @param $plaque
     */
    public function __construct(
        string $code,
        string $name,
        string $slug,
        Brand $brand = null,
        Plaque $plaque = null
    ) {
        $this->code = $code;
        $this->name = $name;
        $this->slug = $slug;
        $this->brand = $brand;
        $this->plaque = $plaque;
    }
}
