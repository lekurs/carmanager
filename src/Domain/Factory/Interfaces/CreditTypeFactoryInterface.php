<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\CreditType;

interface CreditTypeFactoryInterface
{
    /**
     * @param string $type
     * @return CreditType
     */
    public function create(string $type): CreditType;
}
