<?php

namespace App\DataFixtures;

use App\Domain\Factory\GarageFactory;
use App\Domain\Factory\Interfaces\UserFactoryInterface;
use App\Domain\Models\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $userFactory;

    /**
     * AppFixtures constructor.
     * @param $userFactory
     */
    public function __construct(UserFactoryInterface $userFactory)
    {
        $this->userFactory = $userFactory;
    }


    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 20; $i++) {
            $user = $this->userFactory->create(
                $this->randomName(),
                $this->randomLastName(),
                '123456',
                'ROLE_USER',
                $this->uniqueEmail(),
                true,
                $this->randomName() . '-' . $this->uniqueEmail(),
                null
            );

            $manager->persist($user);
        }

        $manager->flush();
    }

    private function randomLastName()
    {
        $names = [
           'Jean',
           'Pierre',
           'Louis',
           'Stephane',
           'Stephanie',
           'Louise',
           'Guillaume',
           'Stan',
           'Claire',
           'Romain',
        ];

        return $names[rand(0, count($names) -1)];
    }

    private function randomName()
    {
        $names = [
            'TABLE',
            'CUISINE',
            'CLAVIER',
            'ECRAN',
            'SOURIS',
            'CABLE',
            'BIDON',
            'BIDULE',
            'TRUC',
            'MACHIN',
        ];

        return $names[rand(0, count($names) -1)];
    }

    private function uniqueEmail()
    {
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabscdefghijklmnopqrstuvwxyz";

        $length = strlen($chars);

        $random = '';

        for ($i=0; $i < 30; $i++) {
            $random .= $chars [rand(0, $length -1)];
        }

        return $random;
    }
}
