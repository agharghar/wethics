<?php


namespace App\Repository;

use App\Entity\ModelesDeSoins;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ModelesDeSoins|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModelesDeSoins|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModelesDeSoins[]    findAll()
 * @method ModelesDeSoins[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModelesDeSoinsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModelesDeSoins::class);
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