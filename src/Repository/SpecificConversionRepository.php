<?php

namespace App\Repository;

use App\Entity\SpecificConversion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SpecificConversion|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpecificConversion|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpecificConversion[]    findAll()
 * @method SpecificConversion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecificConversionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpecificConversion::class);
    }

    // /**
    //  * @return SpecificConversion[] Returns an array of SpecificConversion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SpecificConversion
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
