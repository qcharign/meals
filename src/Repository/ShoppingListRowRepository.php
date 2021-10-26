<?php

namespace App\Repository;

use App\Entity\Department;
use App\Entity\ShoppingList;
use App\Entity\ShoppingListRow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ShoppingListRow|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShoppingListRow|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShoppingListRow[]    findAll()
 * @method ShoppingListRow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShoppingListRowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShoppingListRow::class);
    }

    /**
     * @param ShoppingList $shoppingList
     * @param Department   $department
     * @return int|mixed|string
     */
    public function findByShoppingListAndDepartment(ShoppingList $shoppingList, Department $department)
    {
        $result = $this->createQueryBuilder("r")
            ->innerJoin("r.ingredient", "i")
            ->innerJoin("i.department", "d")
            ->andWhere("r.shoppinglist = :myShoppingList")
            ->andWhere("i.department = :myDepartment")
            ->setParameter("myShoppingList", $shoppingList)
            ->setParameter("myDepartment", $department)
            ->getQuery()
            ->getResult();
        return $result;
    }

    // /**
    //  * @return ShoppingListRow[] Returns an array of ShoppingListRow objects
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
    public function findOneBySomeField($value): ?ShoppingListRow
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
