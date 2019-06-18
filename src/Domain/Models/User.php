<?php


namespace App\Domain\Models;


use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @ORM\Entity(repositoryClass="App\Domain\Repository\UserRepository")
 * @ORM\Table(name="carmanager_user")
 */
class User implements UserInterface
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="id")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false, unique=true)
     */
    private $username;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false, unique=true)
     */
    private $password;

    /**
     * @var array
     * @ORM\Column(type="array")
     */
    private $roles;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false, unique=true)
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false, unique=true)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity="Garage")
     * @ORM\JoinColumn(name="garage_id", referencedColumnName="id")
     */
    private $garage;

    /**
     * User constructor.
     * @param string $username
     * @param string $password
     * @param callable $encoder
     * @param array $roles
     * @param string $email
     * @param string $slug
     * @param Garage|null $garage
     */
    public function __construct(
        string $username,
        string $password,
        callable $encoder,
        array $roles,
        string $email,
        string $slug,
        Garage $garage = null
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->password = $encoder($password, null);
        $this->roles = $roles;
        $this->email = $email;
        $this->slug = $slug;
        $this->garage = $garage;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return mixed
     */
    public function getGarage()
    {
        return $this->garage;
    }
}