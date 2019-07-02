<?php


namespace App\Domain\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class CreditType
 * @ORM\Entity(repositoryClass="App\Domain\Repository\CreditTypeRepository")
 * @ORM\Table(name="carmanager_credit_type")
 */
class CreditType
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Doctrine\ORM\Id\UuidGenerator")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true, nullable=false)
     */
    private $type;

    /**
     * CreditType constructor.
     * @param $type
     */
    public function __construct(string  $type)
    {
        $this->type = $type;
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
    public function getType()
    {
        return $this->type;
    }
}
