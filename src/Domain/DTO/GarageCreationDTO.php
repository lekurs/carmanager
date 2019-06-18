<?php


namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\GarageCreationDTOInterface;
use App\Domain\Models\Marque;

class GarageCreationDTO implements GarageCreationDTOInterface
{
    public $code;

    public $name;

    public $marque;

    /**
     * GarageCreationDTO constructor.
     *
     * @param string $name
     * @param string $code
     * @param Marque|null $marque
     */
    public function __construct(string $name, string $code = null, Marque $marque = null)
    {
        $this->name = $name;
        $this->code = $code;
        $this->marque = $marque;
    }
}
