<?php


namespace App\Domain\Repository;


use App\Domain\Models\Garage;
use App\Domain\Repository\Interfaces\GarageRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class GarageRepository extends ServiceEntityRepository implements GarageRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Garage::class);
    }
}