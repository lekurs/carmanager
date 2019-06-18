<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\ZoneFactoryInterface;
use App\Domain\Models\Zone;

final class ZoneFactory implements ZoneFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(string $zone): Zone
    {
        return new Zone($zone);
    }
}
