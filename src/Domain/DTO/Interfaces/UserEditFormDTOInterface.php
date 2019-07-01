<?php


namespace App\Domain\DTO\Interfaces;


use App\Domain\Models\Garage;

interface UserEditFormDTOInterface
{
    public function __construct(
        string $username,
        string $lastName,
        string $password,
        string $roles,
        string $email,
        bool $online,
        Garage $garage = null
    );
}