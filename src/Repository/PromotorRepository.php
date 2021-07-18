<?php

namespace App\Repository;

use App\Entity\Promotor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Promotor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Promotor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Promotor[]    findAll()
 * @method Promotor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PromotorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Promotor::class);
    }

    // /**
    //  * @return Promotor[] Returns an array of Promotor objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Promotor
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
