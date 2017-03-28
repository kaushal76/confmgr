<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class FullPaper
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="full_papers")
 *
 */
class FullPaper {

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
     * Many FullPapers have One Paper
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Paper", inversedBy="fullPapers")
     * @ORM\JoinColumn(name="paper_id", referencedColumnName="id")
     */
    protected $paper;

    /**
     * One FullPaper have Many FullPaperReviews
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FullPaperReview", mappedBy="fullPaper", cascade={"persist"})
     */
    protected $fullPaperReviews;

    /**
     * @ORM\Column(type="integer")
     */
    protected $reviewOutcome;

    /**
     * @ORM\Column(type="text")
     */
    protected $reviewOutcomeComment;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $archived;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $deleted;


    /**
     * constructor
     */
    public function __construct()
    {
        $this->fullPaperReviews = new ArrayCollection();
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
    public function getFullPaperReviews()
    {
        return $this->fullPaperReviews;
    }

    /**
     * @param mixed $fullPaperReviews
     */
    public function setFullPaperReviews($fullPaperReviews)
    {
        $this->fullPaperReviews = $fullPaperReviews;
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
    public function getReviewOutcomeComment()
    {
        return $this->reviewOutcomeComment;
    }

    /**
     * @param mixed $reviewOutcomeComment
     */
    public function setReviewOutcomeComment($reviewOutcomeComment)
    {
        $this->reviewOutcomeComment = $reviewOutcomeComment;
    }

    /**
     * @return mixed
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * @param mixed $archived
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param mixed $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * Add FullPaperReviews
     * @param FullPaperReview $fullPaperReviews
     * @return FullPaper
     */
    public function addFullPaperReview(FullPaperReview $fullPaperReviews)
    {

        $fullPaperReviews->setFullPaper($this);

        if (!$this->getFullPaperReviews()->contains($fullPaperReviews)) {
            $this->fullPaperReviews->add($fullPaperReviews);
        }

        return $this;
    }


    /**
     * Remove FullPaperReview
     * @param FullPaperReview $fullPaperReviews
     */
    public function removeFullPaperReview(FullPaperReview $fullPaperReviews)
    {
        $this->fullPaperReviews->removeElement($fullPaperReviews);
    }

}
