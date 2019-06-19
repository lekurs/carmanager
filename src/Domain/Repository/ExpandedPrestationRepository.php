<?php


namespace App\Domain\Repository;


use App\Domain\Models\ExpandedProduct;
use App\Domain\Repository\Interfaces\ExpandedPrestationRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ExpandedPrestationRepository extends ServiceEntityRepository implements ExpandedPrestationRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExpandedProduct::class);
    }
}