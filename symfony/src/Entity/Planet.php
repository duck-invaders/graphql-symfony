<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlanetRepository")
 */
class Planet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name; 

    /**
     * @ORM\ManyToMany(targetEntity="Astronaut")
     * @ORM\JoinTable(name="planet_astronaut",
     *      joinColumns={@ORM\JoinColumn(name="planet_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="astronaut_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $astronauts;

    public function __construct()
    {
        $this->astronauts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getAstronauts()
    {
        return $this->astronauts;
    }

    public function setAstronauts($astronauts)
    {
        $this->astronauts = $astronauts;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }
}
