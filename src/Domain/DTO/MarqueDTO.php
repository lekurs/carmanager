<?php


namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\MarqueDTOInterface;

class MarqueDTO implements MarqueDTOInterface
{
    public $marque;

    /**
     * MarqueDTO constructor.
     *
     * @param string $marque
     */
    public function __construct(string $marque)
    {
        $this->marque = $marque;
    }
}
