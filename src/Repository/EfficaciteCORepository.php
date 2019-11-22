<?php


namespace App\Repository;


use App\Entity\EfficaciteCO;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EfficaciteCO|null find($id, $lockMode = null, $lockVersion = null)
 * @method EfficaciteCO|null findOneBy(array $criteria, array $orderBy = null)
 * @method EfficaciteCO[]    findAll()
 * @method EfficaciteCO[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EfficaciteCORepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EfficaciteCO::class);
    }

}