<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractReview
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="abstract_reviews")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AbstractReviewRepository")
 */
class AbstractReview {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Many AbstractReviews have one PaperAbstract
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PaperAbstract", inversedBy="abstractReviews")
     * @ORM\JoinColumn(name="abstract_id", referencedColumnName="id")
     */
    protected $paperAbstract;

    /**
     * One AbstractReview has one Reviewer
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
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * @param mixed $abstract
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;
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
