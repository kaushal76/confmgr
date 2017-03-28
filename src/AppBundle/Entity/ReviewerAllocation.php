<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AuthorAllocation
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="reviewer_paper_allocations")
 *
 */
class ReviewerAllocation {

    /**
     *
     * @var
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Paper", inversedBy="reviewerAllocations")
     * @ORM\JoinColumn(name="paper_id", referencedColumnName="id")
     *
     */
    protected $paper;

    /**
     *
     * @var
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Reviewer", inversedBy="reviewerAllocations")
     * @ORM\JoinColumn(name="reviewer_id", referencedColumnName="id")
     */
    protected $reviewer;

    /**
     * @var boolean
     */
    protected $agreed;

    /**
     * @var string
     */
    protected $token;

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

    /**
     * @return mixed
     */
    public function getAgreed()
    {
        return $this->agreed;
    }

    /**
     * @param mixed $agreed
     */
    public function setAgreed($agreed)
    {
        $this->agreed = $agreed;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

}
