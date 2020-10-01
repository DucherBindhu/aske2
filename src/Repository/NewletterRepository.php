<?php

namespace App\Repository;

use App\Entity\Newletter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Newletter|null find($id, $lockMode = null, $lockVersion = null)
 * @method Newletter|null findOneBy(array $criteria, array $orderBy = null)
 * @method Newletter[]    findAll()
 * @method Newletter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewletterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Newletter::class);
    }

    // /**
    //  * @return Newlatter[] Returns an array of Newlatter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Newlatter
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
