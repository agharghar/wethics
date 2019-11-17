<?php

namespace App\Repository;

use App\Entity\ContextesDeSoin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ContextesDeSoin|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContextesDeSoin|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContextesDeSoin[]    findAll()
 * @method ContextesDeSoin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContextesDeSoinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContextesDeSoin::class);
    }

    // /**
    //  * @return ContextesDeSoin[] Returns an array of ContextesDeSoin objects
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
    public function findOneBySomeField($value): ?ContextesDeSoin
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
