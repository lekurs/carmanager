<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Credit;
use App\Domain\Models\CreditType;

interface CreditFactoryInterface
{
    /**
     * @param int $amount
     * @param CreditType $creditType
     * @return Credit
     */
    public function create(int $amount, CreditType $creditType): Credit;
}
