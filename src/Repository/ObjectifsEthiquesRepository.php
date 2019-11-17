<?php

namespace App\Repository;

use App\Entity\ObjectifsEthiques;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ObjectifsEthiques|null find($id, $lockMode = null, $lockVersion = null)
 * @method ObjectifsEthiques|null findOneBy(array $criteria, array $orderBy = null)
 * @method ObjectifsEthiques[]    findAll()
 * @method ObjectifsEthiques[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObjectifsEthiquesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ObjectifsEthiques::class);
    }

    // /**
    //  * @return ObjectifsEthiques[] Returns an array of ObjectifsEthiques objects
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
    public function findOneBySomeField($value): ?ObjectifsEthiques
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
