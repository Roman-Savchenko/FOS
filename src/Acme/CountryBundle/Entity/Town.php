<?php

// src/Acme/CountryBundle/Entity/Town.php
namespace Acme\CountryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="town")
* @ORM\Entity(repositoryClass="Acme\CountryBundle\Entity\Repository\TownRepository")
 */
class Town
{
    /**
     * @ORM\ManyToOne(targetEntity="Acme\StoreBundle\Entity\Country", inversedBy="towns")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    protected $country;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;
    
    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Town
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Town
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set country
     *
     * @param \Acme\StoreBundle\Entity\Country $country
     * @return Town
     */
    public function setCountry(\Acme\StoreBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Acme\StoreBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }
}
