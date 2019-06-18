<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Marque;

interface MarqueFactoryInterface
{
    /**
     * @param string $marque
     * @return Marque
     */
    public function create(string $marque): Marque;
}
