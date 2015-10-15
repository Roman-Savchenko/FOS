<?php
namespace Acme\BugBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="project")
 **/
class Project
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $label;

    /**
     * @ORM\Column(type="string", length=300)
     */
    protected $summary;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $code;

    /**
     * @ORM\Column(type="string", length=30)
     */
    protected $members;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="projects")
     */

    protected $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }




}