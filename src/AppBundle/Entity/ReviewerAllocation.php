<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class ReviewerAllocation
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="reviewer_allocations")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AuthorAllocationRepository")
 */
class ReviewerAllocation {

    /**
     *
     * @var
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Reviewer", inversedBy="paperAllocations")
     * @ORM\JoinColumn(name="reviewer", referencedColumnName="id")
     */
    protected $reviewer;

    /**
     *
     * @var
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Paper", inversedBy="reviewerAllocations")
     * @ORM\JoinColumn(name="paper", referencedColumnName="id")
     */
    protected $paper;

    /**
     * @return mixed
     */
    public function getReviewer()
    {
        return $this->reviewer;
    }

    /**
     * @param mixed $reviewer
     */
    public function setReviewer($reviewer)
    {
        $this->reviewer = $reviewer;
    }

    /**
     * @return mixed
     */
    public function getPaper()
    {
        return $this->paper;
    }

    /**
     * @param mixed $paper
     */
    public function setPaper($paper)
    {
        $this->paper = $paper;
    }

    
}
