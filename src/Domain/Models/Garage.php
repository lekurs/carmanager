<?php


namespace App\Domain\Models;

use App\Domain\DTO\Interfaces\GarageEditDTOInterface;
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
     * @ORM\Column(type="string", length=20, unique=true, nullable=true, columnDefinition="UNSIGNED ZEROFILL")
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255, unique=true, nullable=false)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Brand")
     * @ORM\JoinColumn(name="brand_id", referencedColumnName="id")
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity="Plaque")
     * @ORM\JoinColumn(name="plaque_id", referencedColumnName="id")
     */
    private $plaque;

    /**
     * @ORM\Column(type="string", length=255, unique=true, nullable=false)
     */
    private $slug;

    /**
     * Garage constructor.
     * @param string $name
     * @param string $slug
     * @param string $code
     * @param Plaque|null $plaque
     * @param $brand
     */
    public function __construct(
        string $name,
        string $slug,
        string $code = null,
        Plaque $plaque = null,
        $brand= null
    ) {
        $this->name = $name;
        $this->slug = $slug;
        $this->code = $code;
        $this->plaque = $plaque;
        $this->brand = $brand;
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

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @return mixed
     */
    public function getPlaque()
    {
        return $this->plaque;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    public function editGarage(GarageEditDTOInterface $dto)
    {
        $this->name = $dto->name;
        $this->code = $dto->code;
        $this->plaque = $dto->plaque;
        $this->brand = $dto->brand;
        $this->slug = $dto->slug;
    }
}
