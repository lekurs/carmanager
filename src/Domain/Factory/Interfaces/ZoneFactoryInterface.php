<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Zone;

interface ZoneFactoryInterface
{
    /**
     * @param string $zone
     * @return Zone
     */
    public function create(string $zone): Zone;
}
