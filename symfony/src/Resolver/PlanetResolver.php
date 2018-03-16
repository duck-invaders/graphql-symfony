<?php

namespace App\Resolver;

use App\Repository\PlanetRepository;
use App\Entity\Astronaut;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;


final class PlanetResolver implements ResolverInterface, AliasedInterface
{
    /**
     * @var PlanetRepository
     */
    private $planetRepository;
  
    /**
     *
     * @param PlanetRepository $planetRepository
     */
    public function __construct(PlanetRepository $planetRepository)
    {
        $this->planetRepository = $planetRepository;
    }
  
    /**
     * @return \App\Entity\Planet
     */
    public function resolve(int $id)
    {
        return $this->planetRepository->find($id);
    }

    public function resolveInAstronaut(Astronaut $astronaut, $args, $context, $info)
    {
        return $this->planetRepository->findByAstronaut($astronaut->getId());
    }

    /**
     * {@inheritdoc}
     */
    public static function getAliases(): array
    {
        return [
            'resolve' => 'Planet',
        ];
    }
}