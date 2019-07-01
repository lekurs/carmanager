<?php


namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\PlaqueCreationFormDTOInterface;
use App\Domain\Models\Zone;

class PlaqueCreationFormDTO implements PlaqueCreationFormDTOInterface
{
    public $name;

    public $zone;

    /**
     * PlaqueCreationFormDTO constructor.
     *
     * @param string $name
     * @param Zone $zone
     */
    public function __construct(string $name, Zone $zone = null)
    {
        $this->name = $name;
        $this->zone = $zone;
    }
}
