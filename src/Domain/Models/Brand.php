<?php


namespace App\Domain\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Brand
 *
 * @ORM\Table(name="carmanager_brand")
 * @ORM\Entity(repositoryClass="App\Domain\Repository\BrandRepository")
 */
class Brand
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
    private $brand;

    /**
     * Marque constructor.
     * @param $brand
     */
    public function __construct(string $brand)
    {
        $this->brand = $brand;
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
    public function getBrand(): string
    {
        return $this->brand;
    }
}
