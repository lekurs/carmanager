<?php


namespace App\Domain\Repository;


use App\Domain\Models\User;
use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function getAll(): array
    {
        return $this->createQueryBuilder('user')
                                ->orderBy('user.username', 'ASC')
                                ->orderBy('user.roles', 'ASC')
                                ->getQuery()
                                ->getResult();
    }

    public function getAllOnline(): array
    {
        return $this->createQueryBuilder('user')
            ->orderBy('user.username', 'ASC')
            ->orderBy('user.roles', 'ASC')
            ->where('user.online = 1')
            ->getQuery()
            ->getResult();
    }

    public function getOneBySlug($slug): User
    {
        return $this->createQueryBuilder('user')
                                ->where('user.slug = :slug')
                                ->setParameter('slug', $slug)
                                ->getQuery()
                                ->getOneOrNullResult();
    }

    public function save(User $user): void
    {
        $this->_em->persist($user);
        $this->_em->flush();
    }

    public function edit(): void
    {
        $this->_em->flush();
    }
}