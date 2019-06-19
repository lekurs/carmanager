<?php


namespace App\Domain\Repository;


use App\Domain\Models\Brand;
use App\Domain\Repository\Interfaces\CarRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class CarRepository extends ServiceEntityRepository implements CarRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Brand::class);
    }
}