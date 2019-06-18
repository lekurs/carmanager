<?php


namespace App\Domain\Repository;


use App\Domain\Models\Marque;
use App\Domain\Repository\Interfaces\MarqueRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class MarqueRepository extends ServiceEntityRepository implements MarqueRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Marque::class);
    }

    public function getAll(): array
    {
        return $this->createQueryBuilder('marque')
                                ->orderBy('marque.marque', 'ASC')
                                ->getQuery()
                                ->getResult();
    }

    public function save(Marque $marque): void
    {
        $this->_em->persist($marque);
        $this->_em->flush();
    }
}
