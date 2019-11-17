<?php

namespace App\Repository;

use App\Entity\ObjectifsDeSoin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ObjectifsDeSoin|null find($id, $lockMode = null, $lockVersion = null)
 * @method ObjectifsDeSoin|null findOneBy(array $criteria, array $orderBy = null)
 * @method ObjectifsDeSoin[]    findAll()
 * @method ObjectifsDeSoin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObjectifsDeSoinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ObjectifsDeSoin::class);
    }

    // /**
    //  * @return ObjectifsDeSoin[] Returns an array of ObjectifsDeSoin objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ObjectifsDeSoin
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
