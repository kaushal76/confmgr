<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PaperAbstract
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="paper_abstracts")
 *
 */
class PaperAbstract {

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
     * Many PaperAbstracts one Paper
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Paper", inversedBy="paperAbstracts")
     * @ORM\JoinColumn(name="paper_id", referencedColumnName="id")
     */
    protected $paper;

    /**
     * One PaperAbstract many AbstractReviews
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\AbstractReview", mappedBy="paperAbstract", cascade={"persist"})
     */
    protected $abstractReviews;

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
     * @ORM\Column(type="text")
     */
    protected $abstractText;


    /**
     * constructor
     */
    public function __construct()
    {
        $this->abstractReviews = new ArrayCollection();
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
    public function getAbstractText()
    {
        return $this->abstractText;
    }

    /**
     * @param mixed $abstractText
     */
    public function setAbstractText($abstractText)
    {
        $this->abstractText = $abstractText;
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
    public function getAbstractReviews()
    {
        return $this->abstractReviews;
    }

    /**
     * @param mixed $abstractReviews
     */
    public function setAbstractReviews($abstractReviews)
    {
        $this->abstractReviews = $abstractReviews;
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
     * Add AbstractReviews
     * @param AbstractReview $abstractReviews
     * @return PaperAbstract
     */
    public function addAbstractReview(AbstractReview $abstractReviews)
    {

        $abstractReviews->setAbstract($this);

        if (!$this->getAbstractReviews()->contains($abstractReviews)) {
            $this->abstractReviews->add($abstractReviews);
        }

        return $this;
    }


    /**
     * Remove AbstractReview
     * @param AbstractReview $abstractReviews
     */
    public function removeAbstractReview(AbstractReview $abstractReviews)
    {
        $this->abstractReviews->removeElement($abstractReviews);
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->code;
    }

}
