<?php

namespace Acme\BugBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="comment")
 * @ManyToOne(targetEntity="User")
 * @JoinColumn(name="user_id", referencedColumnName="id")
 *
 **/
class Comment
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
    protected $author;

    /**
     * @ORM\Column(type="string", length=300)
     */
    protected $body;

    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $created;


}