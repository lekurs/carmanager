<?php


namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\BrandDTOInterface;

class BrandDTO implements BrandDTOInterface
{
    public $brand;

    /**
     * BrandDTO constructor.
     *
     * @param string $brand
     */
    public function __construct(string $brand)
    {
        $this->brand = $brand;
    }
}
