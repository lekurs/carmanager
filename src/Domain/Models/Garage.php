<?php


namespace App\Domain\Models;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class Garage
 * @ORM\Table(name="carmanager_garage")
 * @ORM\Entity(repositoryClass="App\Domain\Repository\GarageRepository")
 */
class Garage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, unique=true, nullable=true)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255, unique=true, nullable=false)
     */
    private $name;

    /**
     * Garage constructor.
     * @param $code
     * @param $name
     */
    public function __construct(string $code, string $name)
    {
        $this->code = $code;
        $this->name = $name;
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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}
