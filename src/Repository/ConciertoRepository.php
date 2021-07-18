<?php

namespace App\Repository;

use App\Entity\Concierto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Concierto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Concierto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Concierto[]    findAll()
 * @method Concierto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConciertoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Concierto::class);
    }

    // /**
    //  * @return Concierto[] Returns an array of Concierto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Concierto
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
