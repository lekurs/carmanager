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
     * @ORM\GeneratedValue
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
     * @ORM\ManyToOne(targetEntity="Marque")
     * @ORM\JoinColumn(name="marque_id", referencedColumnName="id")
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255, unique=true, nullable=false)
     */
    private $slug;

    /**
     * Garage constructor.
     * @param string $name
     * @param string $slug
     * @param string $code
     * @param $marque
     */
    public function __construct(
        string $name,
        string $slug,
        string $code = null,
        $marque= null
    ) {
        $this->name = $name;
        $this->slug = $slug;
        $this->code = $code;
        $this->marque = $marque;
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
