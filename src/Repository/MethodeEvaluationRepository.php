<?php

namespace App\Repository;

use App\Entity\MethodeEvaluation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MethodeEvaluation|null find($id, $lockMode = null, $lockVersion = null)
 * @method MethodeEvaluation|null findOneBy(array $criteria, array $orderBy = null)
 * @method MethodeEvaluation[]    findAll()
 * @method MethodeEvaluation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MethodeEvaluationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MethodeEvaluation::class);
    }

    // /**
    //  * @return MethodeEvaluation[] Returns an array of MethodeEvaluation objects
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
    public function findOneBySomeField($value): ?MethodeEvaluation
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
