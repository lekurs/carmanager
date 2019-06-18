<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\UserFactoryInterface;
use App\Domain\Models\Garage;
use App\Domain\Models\User;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class UserFactory implements UserFactoryInterface
{
    private $encoderFactory;

    /**
     * UserFactory constructor.
     * @param $encoderFactory
     */
    public function __construct(EncoderFactoryInterface $encoderFactory)
    {
        $this->encoderFactory = $encoderFactory;
    }

    public function create(string $username, string $password, string $roles, string $email, string $slug, Garage $garage = null): User
    {
        $encoder = $this->encoderFactory->getEncoder(User::class);

        return new User($username, $password, \Closure::fromCallable([$encoder, 'encodePassword']), $roles, $email, $slug, $garage);
    }
}