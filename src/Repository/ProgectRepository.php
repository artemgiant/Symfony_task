<?php

namespace App\Repository;

use App\Entity\Progect;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Progect|null find($id, $lockMode = null, $lockVersion = null)
 * @method Progect|null findOneBy(array $criteria, array $orderBy = null)
 * @method Progect[]    findAll()
 * @method Progect[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProgectRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Progect::class);
    }

    // /**
    //  * @return Progect[] Returns an array of Progect objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Progect
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
