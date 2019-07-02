<?php


namespace App\Domain\Repository;


use App\Domain\Models\Credit;
use App\Domain\Repository\Interfaces\CreditRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class CreditRepository extends ServiceEntityRepository implements CreditRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Credit::class);
    }
}