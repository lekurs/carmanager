<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\BrandFactoryInterface;
use App\Domain\Models\Marque;

class BrandFactory implements BrandFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(string $marque): Marque
    {
        return new Marque($marque);
    }
}
