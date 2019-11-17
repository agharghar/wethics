<?php

namespace App\Repository;

use App\Entity\MethodesEvaluation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MethodesEvaluation|null find($id, $lockMode = null, $lockVersion = null)
 * @method MethodesEvaluation|null findOneBy(array $criteria, array $orderBy = null)
 * @method MethodesEvaluation[]    findAll()
 * @method MethodesEvaluation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MethodesEvaluationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MethodesEvaluation::class);
    }

    // /**
    //  * @return MethodesEvaluation[] Returns an array of MethodesEvaluation objects
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
    public function findOneBySomeField($value): ?MethodesEvaluation
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
