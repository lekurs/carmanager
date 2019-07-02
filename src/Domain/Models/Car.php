<?php


namespace App\Domain\Models;

use Doctrine\ORM\Id\UuidGenerator;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Uuid;

/**
 * Class Car
 * @ORM\Table(name="carmanager_car")
 * @ORM\Entity(repositoryClass="BrandRepository")
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Doctrine\ORM\Id\UuidGenerator")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true, nullable=false)
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity="Brand")
     */
    private $brand;

    /**
     * Car constructor.
     * @param $model
     * @param $brand
     */
    public function __construct(string $model, Brand $brand)
    {
        $this->model = $model;
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
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }
}
