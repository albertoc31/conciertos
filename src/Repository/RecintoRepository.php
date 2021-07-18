<?php

namespace App\Repository;

use App\Entity\Recinto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Recinto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recinto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recinto[]    findAll()
 * @method Recinto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecintoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recinto::class);
    }

    // /**
    //  * @return Recinto[] Returns an array of Recinto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Recinto
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
