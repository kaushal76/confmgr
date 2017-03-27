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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ReviewerAllocation", mappedBy="reviewer", cascade={"persist"})
     */
    protected $reviewerAllocations;

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
        $this->reviewerAllocations = new ArrayCollection();
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
    public function getReviewerAllocations()
    {
        return $this->reviewerAllocations;
    }

    /**
     * @param mixed $reviewerAllocations
     */
    public function setReviewerAllocations($reviewerAllocations)
    {
        $this->reviewerAllocations = $reviewerAllocations;
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

    /**
     * Add ReviewerAllocation
     * @param ReviewerAllocation $reviewerAllocations
     * @return Reviewer
     */
    public function addReviewerAllocation(ReviewerAllocation $reviewerAllocations)
    {

        $reviewerAllocations->setReviewer($this);

        if (!$this->getReviewerAllocations()->contains($reviewerAllocations)) {
            $this->reviewerAllocations->add($reviewerAllocations);
        }
        return $this;
    }


    /**
     * Remove ReviewerAllocation
     * @param ReviewerAllocation $reviewerAllocations
     */
    public function removeReviewerAllocation(ReviewerAllocation $reviewerAllocations)
    {
        $this->reviewerAllocations->removeElement($reviewerAllocations);
    }

}
