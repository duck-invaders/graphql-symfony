<?php

namespace App\Resolver;

use App\Repository\AstronautRepository;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;


final class AstronautResolver implements ResolverInterface, AliasedInterface
{
    /**
     * @var AstronautRepository
     */
    private $astronautRepository;
  
    /**
     *
     * @param AstronautRepository $astronautRepository
     */
    public function __construct(AstronautRepository $astronautRepository)
    {
        $this->astronautRepository = $astronautRepository;
    }
  
    /**
     * @return \App\Entity\Planet
     */
    public function resolve(int $id)
    {
        return $this->astronautRepository->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function getAliases(): array
    {
        return [
            'resolve' => 'Astronaut',
        ];
    }
}