<?php

namespace App\Repository;

use App\Entity\RecipeRow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecipeRow|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecipeRow|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecipeRow[]    findAll()
 * @method RecipeRow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipeRowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecipeRow::class);
    }

    // /**
    //  * @return RecipeRow[] Returns an array of RecipeRow objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecipeRow
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
