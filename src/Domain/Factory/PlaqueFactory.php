<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\PlaqueFactoryInterface;
use App\Domain\Models\Plaque;
use App\Domain\Models\Zone;

final class PlaqueFactory implements PlaqueFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(string $name, Zone $zone = null): Plaque
    {
        return new Plaque($name, $zone);
    }
}
