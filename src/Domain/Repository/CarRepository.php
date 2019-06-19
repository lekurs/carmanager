<?php


namespace App\Domain\Repository;


use App\Domain\Models\Car;
use App\Domain\Repository\Interfaces\CarRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

final class CarRepository extends ServiceEntityRepository implements CarRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

    public function getAll(): array
    {
        return $this->createQueryBuilder('car')
                                ->orderBy('car.model')
                                ->getQuery()
                                ->getResult();
    }

    public function save(Car $car): void
    {
        $this->_em->persist($car);
        $this->_em->flush();
    }
}