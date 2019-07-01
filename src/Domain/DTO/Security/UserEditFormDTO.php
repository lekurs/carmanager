<?php


namespace App\Domain\DTO\Security;


use App\Domain\DTO\Interfaces\UserEditFormDTOInterface;
use App\Domain\Models\Garage;

class UserEditFormDTO implements UserEditFormDTOInterface
{
    public $username;

    public $lastName;

    public $password;

    public $roles;

    public $email;

    public $online;

    public $garage;

    /**
     * UserEditFormDTO constructor.
     *
     * @param $username
     * @param $lastName
     * @param $password
     * @param $roles
     * @param $email
     * @param $online
     * @param $garage
     */
    public function __construct(
        string $username,
        string $lastName,
        string $password,
        string $roles,
        string $email,
        bool $online,
        Garage $garage = null
    ) {
        $this->username = $username;
        $this->lastName = $lastName;
        $this->password = $password;
        $this->roles = $roles;
        $this->email = $email;
        $this->online = $online;
        $this->garage = $garage;
    }
}
