<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * Many FullPaperReviews have one FullPaper
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FullPaper", inversedBy="fullPaperReviews")
     * @ORM\JoinColumn(name="full_paper_id", referencedColumnName="id")
     */
    protected $fullPaper;

    /**
     * One FullPaperReview has one Reviewer
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Reviewer")
     * @ORM\JoinColumn(name="reviewer_id", referencedColumnName="id")
     */
    protected $reviewer;

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
    public function getFullPaper()
    {
        return $this->fullPaper;
    }

    /**
     * @param mixed $fullPaper
     */
    public function setFullPaper($fullPaper)
    {
        $this->fullPaper = $fullPaper;
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

}
