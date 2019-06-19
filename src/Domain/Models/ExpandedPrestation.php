<?php


namespace App\Domain\Models;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * Class ExpandedPrestation
 * @ORM\Table(name="carmanager_expanded_prestation")
 * @ORM\Entity(repositoryClass="App\Domain\Repository\ExpandedPrestationRepository")
 */
class ExpandedPrestation
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false, unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="float", precision=6, scale=2)
     */
    private $price;

    /**
     * ExpandedPrestation constructor.
     *
     * @param $name
     * @param $price
     * @throws \Exception
     */
    public function __construct(string $name, int $price)
    {
//        $this->id = Uuid::uuid4();
        $this->name = $name;
        $this->price = $price;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }
}