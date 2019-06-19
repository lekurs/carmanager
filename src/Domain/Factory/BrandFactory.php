<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\BrandFactoryInterface;
use App\Domain\Models\Brand;

class BrandFactory implements BrandFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(string $brand): Brand
    {
        return new Brand($brand);
    }
}
