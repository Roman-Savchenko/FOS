<?php

namespace Acme\BugBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 **/
class User
{

     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $avatar;

    /**
     * @ORM\Column(type="string", length=30)
     */
    protected $password;

    /**
     * @ORM\Column(type="integer")
     */

    protected $roles;

    /**
     * @ORM\ManyToMany(targetEntity="Acme\BugBundle\Entity\Project", inversedBy="users")
     * @ORM\JoinTable(name="users_projects"
     * @ORM\ManyToMany(targetEntity="Issue", inversedBy="users")
     * @ORM\JoinTable(name="users_issues")
     *
     */

    protected $projects;

    protected $issues;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
        $this->issues = new ArrayCollection();
    }
}