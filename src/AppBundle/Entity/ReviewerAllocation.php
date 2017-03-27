<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AuthorAllocation
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="author_paper_allocations")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReviewerAllocationRepository")
 */
class ReviewerAllocation {

    /**
     *
     * @var
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Paper", inversedBy="authorAllocations")
     * @ORM\JoinColumn(name="paper", referencedColumnName="id")
     *
     */
    protected $paper;

    /**
     *
     * @var
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Reviewer", inversedBy="reviewerAllocations")
     * @ORM\JoinColumn(name="reviewer", referencedColumnName="id")
     */
    protected $reviewer;

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

}
