<?php

namespace App\Repository;

use App\Entity\ModelesDeSoin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ModelesDeSoin|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModelesDeSoin|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModelesDeSoin[]    findAll()
 * @method ModelesDeSoin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModelesDeSoinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModelesDeSoin::class);
    }

    // /**
    //  * @return ModelesDeSoin[] Returns an array of ModelesDeSoin objects
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
    public function findOneBySomeField($value): ?ModelesDeSoin
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