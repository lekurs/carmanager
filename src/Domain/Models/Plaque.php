<?php


namespace App\Domain\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Plaque
 * @ORM\Table(name="carmanager_plaque")
 * @ORM\Entity(repositoryClass="App\Domain\Repository\PlaqueRepository")
 */
class Plaque
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=false, unique=true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Zone")
     * @ORM\JoinColumn(name="zone_id", referencedColumnName="id")
     */
    private $zone;

    /**
     * Plaque constructor.
     * @param $name
     * @param $zone
     */
    public function __construct(string $name, Zone $zone = null)
    {
        $this->name = $name;
        $this->zone = $zone;
    }

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getZone(): ? Zone
    {
        return $this->zone;
    }
}