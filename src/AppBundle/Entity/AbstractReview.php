<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AbstractReview
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="abstract_reviews")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaperAbstractRepository")
 */
class AbstractReview {

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
     * Many PaperAbstracts one paper
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PaperAbstract", inversedBy="abstractReviews")
     * @ORM\JoinColumn(name="abstract", referencedColumnName="id")
     */
    protected $abstract;

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

    /**
     * @return string
     */
    public function __toString() {
        return $this->code;
    }

}
