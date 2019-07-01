<?php


namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Garage;
use App\Domain\Models\User;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

interface UserFactoryInterface
{
    /**
     * UserFactoryInterface constructor.
     * @param EncoderFactoryInterface $encoderFactory
     */
    public function __construct(EncoderFactoryInterface $encoderFactory);

    /**
     * @param string $username
     * @param string $lastName
     * @param string $password
     * @param string $roles
     * @param string $email
     * @param bool $online
     * @param string $slug
     * @param Garage|null $garage
     * @return User
     */
    public function create(string $username, string $lastName, string $password, string $roles, string $email, bool $online, string $slug, Garage $garage = null): User;
}
