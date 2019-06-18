<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\MarqueFactoryInterface;
use App\Domain\Models\Marque;

class MarqueFactory implements MarqueFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(string $marque): Marque
    {
        return new Marque($marque);
    }
}
