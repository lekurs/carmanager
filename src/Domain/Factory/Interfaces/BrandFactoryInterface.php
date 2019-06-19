<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Brand;

interface BrandFactoryInterface
{
    /**
     * @param string $brand
     * @return Brand
     */
    public function create(string $brand): Brand;
}
