<?php

namespace App\Repository;

use App\Entity\Months;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Months|null find($id, $lockMode = null, $lockVersion = null)
 * @method Months|null findOneBy(array $criteria, array $orderBy = null)
 * @method Months[]    findAll()
 * @method Months[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MonthsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Months::class);
    }

    // /**
    //  * @return Months[] Returns an array of Months objects
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
    public function findOneBySomeField($value): ?Months
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
