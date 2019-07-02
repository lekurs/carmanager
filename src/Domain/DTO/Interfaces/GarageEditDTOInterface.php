<?php


namespace App\Domain\DTO\Interfaces;


use App\Domain\Models\Brand;
use App\Domain\Models\Plaque;

interface GarageEditDTOInterface
{
    /**
     * GarageEditDTOInterface constructor.
     *
     * @param string $code
     * @param string $name
     * @param Brand|null $brand
     * @param Plaque|null $plaque
     */
    public function __construct(
        string $code,
        string $name,
        Brand $brand = null,
        Plaque $plaque = null
    );
}
