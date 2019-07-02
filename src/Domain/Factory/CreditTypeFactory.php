<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\CreditTypeFactoryInterface;
use App\Domain\Models\CreditType;

final class CreditTypeFactory implements CreditTypeFactoryInterface
{
    public function create(string $type): CreditType
    {
        return new CreditType($type);
    }
}
