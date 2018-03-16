<?php

namespace App\Repository;

use App\Entity\Planet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Planet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Planet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Planet[]    findAll()
 * @method Planet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanetRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Planet::class);
    }

    public function findByAstronaut($id)
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('p.astronauts', 'a')
            ->andWhere('a.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
        ;
    }
    
}
