<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class CameraReadyPaper
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="camera_ready_papers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CameraReadyPaperRepository")
 */
class CameraReadyPaper {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * Many CameraReadyPapers have One Paper
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Paper", inversedBy="cameraReadyPapers")
     * @ORM\JoinColumn(name="paper", referencedColumnName="id")
     */
    protected $paper;

    /**
     * One CameraReadyPaper many CameraReadyPaperReviews
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CameraReadyPaperReview", mappedBy="cameraReadyPaper", cascade={"persist"})
     */
    protected $cameraReadyPaperReviews;


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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
    public function getCameraReadyPaperReviews()
    {
        return $this->cameraReadyPaperReviews;
    }

    /**
     * @param mixed $cameraReadyPaperReviews
     */
    public function setCameraReadyPaperReviews($cameraReadyPaperReviews)
    {
        $this->cameraReadyPaperReviews = $cameraReadyPaperReviews;
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

}
