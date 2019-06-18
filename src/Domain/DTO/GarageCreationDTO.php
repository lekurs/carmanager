<?php


namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\GarageCreationDTOInterface;

class GarageCreationDTO implements GarageCreationDTOInterface
{
    public $code;

    public $name;

    /**
     * GarageCreationDTO constructor.
     * @param $code
     * @param $name
     */
    public function __construct(string $name, string $code = null)
    {
        $this->name = $name;
        $this->code = $code;
    }


}