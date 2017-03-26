<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class FullPaperReview
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="full_paper_reviews")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FullPaperReviewRepository")
 */
class FullPaperReview {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $code;

    /**
     * Many fullPapers one paper
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FullPaper", inversedBy="fullPaperReviews")
     * @ORM\JoinColumn(name="full_paper", referencedColumnName="id")
     */
    protected $fullPaper;

    /**
     * @ORM\Column(type="integer")
     */
    protected $reviewOutcome;

    /**
     * @ORM\Column(type="text")
     */
    protected $reviewComment;


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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getFullPaper()
    {
        return $this->fullPaper;
    }

    /**
     * @param mixed $fullPaper
     */
    public function setFullPaper($fullPaper)
    {
        $this->abstract = $fullPaper;
    }

    /**
     * @return mixed
     */
    public function getReviewOutcome()
    {
        return $this->reviewOutcome;
    }

    /**
     * @param mixed $reviewOutcome
     */
    public function setReviewOutcome($reviewOutcome)
    {
        $this->reviewOutcome = $reviewOutcome;
    }

    /**
     * @return mixed
     */
    public function getReviewComment()
    {
        return $this->reviewComment;
    }

    /**
     * @param mixed $reviewComment
     */
    public function setReviewComment($reviewComment)
    {
        $this->reviewComment = $reviewComment;
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->code;
    }

}
