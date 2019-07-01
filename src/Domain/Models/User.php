<?php


namespace App\Domain\Models;


use App\Domain\DTO\Interfaces\UserEditFormDTOInterface;
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
     * @ORM\GeneratedValue
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
     * @ORM\Column(type="string", length=150, nullable=false, unique=false)
     */
    private $lastName;

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
     * @ORM\Column(type="boolean")
     */
    private $online;

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
     * @param string $lastName
     * @param string $password
     * @param callable $encoder
     * @param array $roles
     * @param string $email
     * @param bool $online
     * @param string $slug
     * @param Garage|null $garage
     */
    public function __construct(
        string $username,
        string $lastName,
        string $password,
        callable $encoder,
        $roles,
        string $email,
        bool $online,
        string $slug,
        Garage $garage = null
    ) {
        $this->username = $username;
        $this->lastName = $lastName;
        $this->password = $password;
        $this->password = $encoder($password, null);
        $this->roles = $roles;
        $this->email = $email;
        $this->online = $online;
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
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getRoles(): string
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
     * @return mixed
     */
    public function getOnline()
    {
        return $this->online;
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

    public function editUser(UserEditFormDTOInterface $dto, $password = null): void
    {
        $this->username = $dto->username;
        $this->lastName = $dto->lastName;
        if (!is_null($password)) {
            $this->password = $password;
        } else {
            $this->password = $dto->password;
        }
        $this->email = $dto->email;
        $this->online = $dto->online;
        $this->slug = $dto->slug;
        $this->roles = $dto->roles;
        $this->garage = $dto->garage;
    }
}