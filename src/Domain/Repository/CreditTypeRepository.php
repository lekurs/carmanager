<?php


namespace App\Domain\Repository;


use App\Domain\Models\CreditType;
use App\Domain\Repository\Interfaces\CreditTypeRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class CreditTypeRepository extends ServiceEntityRepository implements CreditTypeRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreditType::class);
    }

    public function getAll(): array
    {
        return $this->createQueryBuilder('credit_type')
                                ->orderBy('credit_type.type', 'ASC')
                                ->getQuery()
                                ->getResult();
    }

    public function save(CreditType $creditType): void
    {
        $this->_em->persist($creditType);
        $this->_em->flush();
    }
}