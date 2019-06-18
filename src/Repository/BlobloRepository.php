<?php

namespace App\Repository;

use App\Entity\Bloblo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Bloblo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bloblo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bloblo[]    findAll()
 * @method Bloblo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlobloRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bloblo::class);
    }

    // /**
    //  * @return Bloblo[] Returns an array of Bloblo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bloblo
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
