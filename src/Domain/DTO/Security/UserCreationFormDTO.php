<?php


namespace App\Domain\DTO\Security;


use App\Domain\DTO\Interfaces\UserCreationFormDTOInterface;
use App\Domain\Models\Garage;

class UserCreationFormDTO implements UserCreationFormDTOInterface
{
    public $username;

    public $lastName;

    public $password;

    public $roles;

    public $email;

    public $garage;

    /**
     * UserCreationFormDTO constructor.
     * @param string $username
     * @param string $lastName
     * @param string $password
     * @param string $roles
     * @param string $email
     * @param Garage $garage
     */
    public function __construct(
        string $username,
        string $lastName,
        string $password,
        string $roles,
        string $email,
        Garage $garage = null
    ) {
        $this->username = $username;
        $this->lastName = $lastName;
        $this->password = $password;
        $this->roles = $roles;
        $this->email = $email;
        $this->garage = $garage;
    }
}
