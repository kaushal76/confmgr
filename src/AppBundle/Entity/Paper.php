<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Paper
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="papers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaperRepository")
 */
class Paper {

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
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     *
     * Many keywords have many papers
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Keyword", inversedBy="papers", cascade={"persist"})
     * @ORM\JoinTable(name="papers_keywords")
     */
    protected $keywords;

    /**
     * One paper has many Abstracts
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PaperAbstract", mappedBy="paper", cascade={"persist"})
     */
    protected $abstracts;

    /**
     * One paper many Full Papers
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FullPaper", mappedBy="paper", cascade={"persist"})
     */
    protected $fullPapers;

    /**
     * One paper has many Camera Ready Papers
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\cameraReadyPaper", mappedBy="paper", cascade={"persist"})
     */
    protected $cameraReadyPapers;

    /**
     * One paper has many Author Allocations
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\AuthorAllocation", mappedBy="paper", cascade={"persist"})
     */
    protected $authorAllocations;

    /**
     * One paper has many ReviewerAllocations
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ReviewerAllocation", mappedBy="paper", cascade={"persist"})
     */
    protected $reviewerAllocations;

    /**
     * constructor
     */
    public function __construct()
    {
        $this->keywords = new ArrayCollection();
        $this->abstracts = new ArrayCollection();
        $this->fullPapers = new ArrayCollection();
        $this->cameraReadyPapers = new ArrayCollection();
        $this->authorAllocations = new ArrayCollection();
        $this->reviewerAllocations = new ArrayCollection();
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param mixed $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return mixed
     */
    public function getAbstracts()
    {
        return $this->abstracts;
    }

    /**
     * @param mixed $abstracts
     */
    public function setAbstracts($abstracts)
    {
        $this->abstracts = $abstracts;
    }

    /**
     * @return mixed
     */
    public function getFullPapers()
    {
        return $this->fullPapers;
    }

    /**
     * @param mixed $fullPapers
     */
    public function setFullPapers($fullPapers)
    {
        $this->fullPapers = $fullPapers;
    }

    /**
     * @return mixed
     */
    public function getCameraReadyPapers()
    {
        return $this->cameraReadyPapers;
    }

    /**
     * @param mixed $cameraReadyPapers
     */
    public function setCameraReadyPapers($cameraReadyPapers)
    {
        $this->cameraReadyPapers = $cameraReadyPapers;
    }

    /**
     * @return mixed
     */
    public function getAuthorAllocations()
    {
        return $this->authorAllocations;
    }

    /**
     * @param mixed $authorAllocations
     */
    public function setAuthorAllocations($authorAllocations)
    {
        $this->authorAllocations = $authorAllocations;
    }

    /**
     * @return mixed
     */
    public function getReviewerAllocations()
    {
        return $this->reviewerAllocations;
    }

    /**
     * @param mixed $reviewerAllocations
     */
    public function setReviewerAllocations($reviewerAllocations)
    {
        $this->reviewerAllocations = $reviewerAllocations;
    }


    /**
     * Add ReviewerAllocations
     *
     * @param ReviewerAllocation $reviewerAllocations
     *
     * @return Paper
     */
    public function addReviewerAllocation(ReviewerAllocation $reviewerAllocations)
    {

        $reviewerAllocations->setPaper($this);

        if (!$this->getReviewerAllocations()->contains($reviewerAllocations)) {
            $this->reviewerAllocations->add($reviewerAllocations);
        }

        return $this;
    }


    /**
     * Remove ReviewerAllocations
     *
     * @param ReviewerAllocation $reviewerAllocations
     */
    public function removeAllocation(ReviewerAllocation $reviewerAllocations)
    {
        $this->reviewerAllocations->removeElement($reviewerAllocations);
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->title;
    }

}
