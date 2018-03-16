<?php

namespace App\Repository;

use App\Entity\Astronaut;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Astronaut|null find($id, $lockMode = null, $lockVersion = null)
 * @method Astronaut|null findOneBy(array $criteria, array $orderBy = null)
 * @method Astronaut[]    findAll()
 * @method Astronaut[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AstronautRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Astronaut::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('a')
            ->where('a.something = :value')->setParameter('value', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
