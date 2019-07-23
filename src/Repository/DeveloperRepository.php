<?php

namespace App\Repository;

use App\Entity\Developer;
use App\Entity\Progect;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Developer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Developer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Developer[]    findAll()
 * @method Developer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeveloperRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Developer::class);
    }

    /**
     * @return Developer[]
     */
    public function findAllRelatedProjectsByDeveloper($id)
    {
        return  $this->getOrCreateQueryBuilder()
            ->leftJoin('a.progects','p')
            ->addSelect('p')
            ->andWhere('a.id = :id')
            ->setParameter('id',$id)
            ->getQuery()->getResult()
            ;

    }


    private function addIsPublishedQueryBuilder(QueryBuilder $qb = null)
    {
        return $this->getOrCreateQueryBuilder($qb)
            ->andWhere('a.publishedAt IS NOT NULL');
    }

    private function getOrCreateQueryBuilder(QueryBuilder $qb = null)
    {
        return $qb ?: $this->createQueryBuilder('a');
    }


}
