<?php

namespace App\Repository;

use App\Entity\Medio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Medio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medio[]    findAll()
 * @method Medio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Medio::class);
    }

    // /**
    //  * @return Medio[] Returns an array of Medio objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Medio
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
