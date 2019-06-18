<?php


namespace App\Domain\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Marque
 *
 * @ORM\Table(name="carmanager_marque")
 * @ORM\Entity(repositoryClass="App\Domain\Repository\MarqueRepository")
 */
class Marque
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
    private $marque;

    /**
     * Marque constructor.
     * @param $marque
     */
    public function __construct(string $marque)
    {
        $this->marque = $marque;
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
    public function getMarque(): string
    {
        return $this->marque;
    }
}
