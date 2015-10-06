<?php

// src/Acme/StoreBundle/Entity
namespace Acme\StoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="Acme\StoreBundle\Entity\Repository\CountryRepository")
 */
class Country
{
    /**
     * @ORM\OneToMany(targetEntity="Acme\CountryBundle\Entity\Town", mappedBy="country")
     */
    protected $towns;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $country;

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
     * Set country
     *
     * @param string $country
     * @return Country
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="countries")
     **/
    protected $users;

    public function __construct() {
        $this->users = new ArrayCollection();
        $this->towns = new ArrayCollection();
    }


    /**
     * Add users
     *
     * @param \Acme\StoreBundle\Entity\User $users
     * @return Country
     */
    public function addUser(\Acme\StoreBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Acme\StoreBundle\Entity\User $users
     */
    public function removeUser(\Acme\StoreBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add towns
     *
     * @param \Acme\CountryBundle\Entity\Town $towns
     * @return Country
     */
    public function addTown(\Acme\CountryBundle\Entity\Town $towns)
    {
        $this->towns[] = $towns;

        return $this;
    }

    /**
     * Remove towns
     *
     * @param \Acme\CountryBundle\Entity\Town $towns
     */
    public function removeTown(\Acme\CountryBundle\Entity\Town $towns)
    {
        $this->towns->removeElement($towns);
    }

    /**
     * Get towns
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTowns()
    {
        return $this->towns;
    }
}
