<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\OrderFactoryInterface;
use App\Domain\Models\Car;
use App\Domain\Models\Order;

class OrderFactory implements OrderFactoryInterface
{
    public function create(
        string $number,
        \DateTime $orderDate,
        int $sellingPrice,
        int $purchasingPrice,
        int $discount,
        int $qualityBonus,
        Car $car,
        \DateTime $deliveryDate = null
    ): Order {
        return new Order(
            $number,
            $orderDate,
            $sellingPrice,
            $purchasingPrice,
            $discount,
            $qualityBonus,
            $car,
            $deliveryDate = null
        );
    }
}
