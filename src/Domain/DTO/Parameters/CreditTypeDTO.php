<?php


namespace App\Domain\DTO\Parameters;


use App\Domain\DTO\Interfaces\CreditTypeDTOInterface;

class CreditTypeDTO implements CreditTypeDTOInterface
{
    public $type;

    /**
     * CreditTypeDTO constructor.
     *
     * @param $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }
}
