<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\CreditFactoryInterface;
use App\Domain\Models\Credit;
use App\Domain\Models\CreditType;

final class CreditFactory implements CreditFactoryInterface
{
    public function create(int $amount, CreditType $creditType): Credit
    {
        return new Credit(
            $amount,
            $creditType
        );
    }
}
