<?php


namespace App\Domain\Repository;


use App\Domain\Models\Plaque;
use App\Domain\Repository\Interfaces\PlaqueRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class PlaqueRepository extends ServiceEntityRepository implements PlaqueRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plaque::class);
    }

    public function getAll(): array
    {
        return $this->createQueryBuilder('plaque')
                                ->orderBy('plaque.name', 'ASC')
                                ->getQuery()
                                ->getResult();
    }

    public function save(Plaque $plaque): void
    {
        $this->_em->persist($plaque);
        $this->_em->flush();
    }
}