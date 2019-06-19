<?php


namespace App\Domain\Repository;


use App\Domain\Models\Brand;
use App\Domain\Repository\Interfaces\BrandRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class BrandRepository extends ServiceEntityRepository implements BrandRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Brand::class);
    }

    public function getAll(): array
    {
        return $this->createQueryBuilder('brand')
                                ->orderBy('brand.brand', 'ASC')
                                ->getQuery()
                                ->getResult();
    }

    public function save(Brand $brand): void
    {
        $this->_em->persist($brand);
        $this->_em->flush();
    }
}
