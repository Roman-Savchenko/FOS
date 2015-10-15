<?php

namespace Acme\BugBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="issue")
 * @ORM\ManyToMany(targetEntity="User", mappedBy="issues")
 * @ManyToOne(targetEntity="Project")
 * @JoinColumn(name="projects_id", referencedColumnName="id")
 **/

class Issue
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=300)
     */
    protected $summary;

    /**
     * @ORM\Column(type="string", length=300)
     */
    protected $code;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\Column(type="string", length= 10)
     */
    protected $type;

    /**
     * @ORM\Column(type="string", length= 15)
     */

    protected $priority;

    /**
     * @ORM\Column(type="string",length= 15)
     */

    protected $status;

    /**
     * @ORM\Column(type="text")
     */

    protected $resolution;

    /**
     * @ORM\Column(type="string",length= 15)
     */

    protected $reporter;

    /**
     * @ORM\Column(type="string", length= 15)
     */
    protected $assignee;

    /**
     * @ORM\Column(type="string", length= 15)
     */
    protected $collaborator;

    /**
     * @ORM\Column(type="string", length= 20)
     */
    protected $parent;

    /**
     * @ORM\Column(type="string", length= 20)
     */

    protected $children;

    /**
     * @ORM\Column(type="string", length=100)
     */

    protected $project;

    /**
     * @ORM\Column(type="string", length= 15)
     */
    protected $created;

    /**
     * @ORM\Column(type="string", length= 15)
     */
    protected $updated;
}