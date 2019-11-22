<?php


namespace App\Repository;



/**
 * @method EfficaciteME|null find($id, $lockMode = null, $lockVersion = null)
 * @method EfficaciteME|null findOneBy(array $criteria, array $orderBy = null)
 * @method EfficaciteME[]    findAll()
 * @method EfficaciteME[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

use App\Entity\EfficaciteME;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class EfficaciteMERepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EfficaciteME::class);
    }

}