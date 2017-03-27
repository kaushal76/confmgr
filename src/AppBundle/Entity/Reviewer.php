<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Reviewer
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="reviewers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReviewerRepository")
 */
class Reviewer {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * One Reviewer has many paperAllocations
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ReviewerAllocation", mappedBy="paper", cascade={"persist"})
     */
    protected $paperAllocations;

    /**
     * One Reviewer has one User
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * constructor
     */
    public function __construct()
    {
        $this->paperAllocations = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPaperAllocations()
    {
        return $this->paperAllocations;
    }

    /**
     * @param mixed $paperAllocations
     */
    public function setPaperAllocations($paperAllocations)
    {
        $this->paperAllocations = $paperAllocations;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

}
