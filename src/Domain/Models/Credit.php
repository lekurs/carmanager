<?php


namespace App\Domain\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Credit
 * @ORM\Entity(repositoryClass="App\Domain\Repository\CreditRepository")
 * @ORM\Table(name="carmanager_credit")
 */
class Credit
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Doctrine\ORM\Id\UuidGenerator")
     */
    private $id;

    /**
     * @ORM\Column(type="float", precision=6, scale=2)
     */
    private $amount;

    /**
     * @ORM\ManyToOne(targetEntity="CreditType")
     * @ORM\JoinColumn(referencedColumnName="credit_type_id", referencedColumnName="id")
     */
    private $creditType;

    /**
     * Credit constructor.
     * @param $amount
     * @param $creditType
     */
    public function __construct(int $amount, CreditType $creditType)
    {
        $this->amount = $amount;
        $this->creditType = $creditType;
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
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getCreditType()
    {
        return $this->creditType;
    }
}
