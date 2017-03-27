<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class CameraReadyPaperReview
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="camera_ready_paper_reviews")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CamerareadyPaperReviewRepository")
 */
class CameraReadyPaperReview {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Many CameraReadyPaperReviews have one CameraReadyPaper
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CameraReadyPaper", inversedBy="cameraReadyPaperReviews")
     * @ORM\JoinColumn(name="camera_ready_paper_id", referencedColumnName="id")
     */
    protected $cameraReadyPaper;


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
    public function getCameraReadyPaper()
    {
        return $this->cameraReadyPaper;
    }

    /**
     * @param mixed $cameraReadyPaper
     */
    public function setCameraReadyPaper($cameraReadyPaper)
    {
        $this->cameraReadyPaper = $cameraReadyPaper;
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
