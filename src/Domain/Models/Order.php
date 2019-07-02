<?php


namespace App\Domain\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Order
 * @ORM\Entity(repositoryClass="App\Domain\Repository\OrderRepository")
 * @ORM\Table(name="carmanager_order")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Doctrine\ORM\Id\UuidGenerator")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true, nullable=false)
     */
    private $number;

    /**
     * @ORM\Column(type="date")
     */
    private $orderDate;

    /**
     * @ORM\Column(type="date")
     */
    private $deliveryDate;

    /**
     * @ORM\Column(type="float", precision=8, scale=2)
     */
    private $sellingPrice;

    /**
     * @ORM\Column(type="float", precision=8, scale=2)
     */
    private $purchasingPrice;

    /**
     * @ORM\Column(type="float", precision=8, scale=2)
     */
    private $discount;

    /**
     * @ORM\Column(type="float", precision=6, scale=2)
     */
    private $qualityBonus;

    /**
     * @ORM\ManyToOne(targetEntity="Car")
     *@ORM\JoinColumn(name="car_id", referencedColumnName="id")
     */
    private $car;

    /**
     * @ORM\ManyToOne(targetEntity="Credit")
     * @ORM\JoinColumn(name="credit_id", referencedColumnName="id")
     */
    private $credit;

    /**
     * Order constructor.
     * @param string $number
     * @param \DateTime $orderDate
     * @param \DateTime $deliveryDate
     * @param int $sellingPrice
     * @param int $purchasingPrice
     * @param int $discount
     * @param int $qualityBonus
     * @param Car $car
     */
    public function __construct(
        string $number,
        \DateTime $orderDate,
        int $sellingPrice,
        int $purchasingPrice,
        int $discount,
        int $qualityBonus,
        Car $car,
        \DateTime $deliveryDate = null
    ) {
        $this->number = $number;
        $this->orderDate = $orderDate;
        $this->sellingPrice = $sellingPrice;
        $this->purchasingPrice = $purchasingPrice;
        $this->discount = $discount;
        $this->qualityBonus = $qualityBonus;
        $this->car = $car;
        $this->deliveryDate = $deliveryDate;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * @return mixed
     */
    public function getSellingPrice()
    {
        return $this->sellingPrice;
    }

    /**
     * @return mixed
     */
    public function getPurchasingPrice()
    {
        return $this->purchasingPrice;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @return mixed
     */
    public function getQualityBonus()
    {
        return $this->qualityBonus;
    }

    /**
     * @return mixed
     */
    public function getCar()
    {
        return $this->car;
    }
}
