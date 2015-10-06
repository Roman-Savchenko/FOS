<?php

// src/Acme/StoreBundle/Entity
namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    protected $user;

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
     * Set user
     *
     * @param string $user
     * @return User
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @ORM\ManyToMany(targetEntity="Country", inversedBy="users")
     * @ORM\JoinTable(name="users_countries")
     **/
    protected $countries;

    public function __construct() {
        $this->countries = new ArrayCollection();
    }



    /**
     * Add countries
     *
     * @param \Acme\StoreBundle\Entity\Country $countries
     * @return User
     */
    public function addCountry(\Acme\StoreBundle\Entity\Country $countries)
    {
        $this->countries[] = $countries;

        return $this;
    }

    /**
     * Remove countries
     *
     * @param \Acme\StoreBundle\Entity\Country $countries
     */
    public function removeCountry(\Acme\StoreBundle\Entity\Country $countries)
    {
        $this->countries->removeElement($countries);
    }

    /**
     * Get countries
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCountries()
    {
        return $this->countries;
    }
}
