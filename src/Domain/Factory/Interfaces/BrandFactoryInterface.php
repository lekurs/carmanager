<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Marque;

interface BrandFactoryInterface
{
    /**
     * @param string $marque
     * @return Marque
     */
    public function create(string $marque): Marque;
}
