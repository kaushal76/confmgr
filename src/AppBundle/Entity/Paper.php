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
     * One Paper has many KeywordAllocations
     * @ORM\OnetoMany(targetEntity="AppBundle\Entity\KeywordAllocation", mappedBy="paper", cascade={"persist"})
     * @ORM\JoinTable(name="papers_keywords_allocations")
     */
    protected $keywordAllocations;

    /**
     * One paper has many Abstracts
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PaperAbstract", mappedBy="paper", cascade={"persist"})
     */
    protected $paperAbstracts;

    /**
     * One paper many FullPapers
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FullPaper", mappedBy="paper", cascade={"persist"})
     */
    protected $fullPapers;

    /**
     * One paper has many CameraReadyPapers
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CameraReadyPaper", mappedBy="paper", cascade={"persist"})
     */
    protected $cameraReadyPapers;

    /**
     * One paper has many AuthorAllocations
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\AuthorAllocation", mappedBy="paper", cascade={"persist"})
     */
    protected $authorAllocations;

    /**
     * One paper has many ReviewerAllocations
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ReviewerAllocation", mappedBy="paper", cascade={"persist"})
     */
    protected $reviewerAllocations;

    /**
     * One Paper has one Theme
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Theme")
     * @ORM\JoinColumn(name="theme_id", referencedColumnName="id")
     */
    protected $theme;

    /**
     * constructor
     */
    public function __construct()
    {
        $this->keywords = new ArrayCollection();
        $this->paperAbstracts = new ArrayCollection();
        $this->fullPapers = new ArrayCollection();
        $this->cameraReadyPapers = new ArrayCollection();
        $this->authorAllocations = new ArrayCollection();
        $this->reviewerAllocations = new ArrayCollection();
        $this->keywordAllocations = new ArrayCollection();
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
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param mixed $theme
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;
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
    public function getPaperAbstracts()
    {
        return $this->paperAbstracts;
    }

    /**
     * @param mixed $paperAbstracts
     */
    public function setPaperAbstracts($paperAbstracts)
    {
        $this->paperAbstracts = $paperAbstracts;
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
     * Add PaperAbstracts
     *
     * @param PaperAbstract $paperAbstracts
     *
     * @return Paper
     */
    public function addPaperAbstract(PaperAbstract $paperAbstracts)
    {

        $paperAbstracts->setPaper($this);

        if (!$this->getPaperAbstracts()->contains($paperAbstracts)) {
            $this->paperAbstracts->add($paperAbstracts);
        }

        return $this;
    }


    /**
     * Remove PaperAbstracts
     *
     * @param PaperAbstract $paperAbstracts
     */
    public function removePaperAllocation(PaperAbstract $paperAbstracts)
    {
        $this->paperAbstracts->removeElement($paperAbstracts);
    }

    /**
     * Add FullPapers
     *
     * @param FullPaper $fullPaper
     *
     * @return Paper
     */
    public function addFullPaper(FullPaper $fullPaper)
    {

        $fullPaper->setPaper($this);

        if (!$this->getFullPapers()->contains($fullPaper)) {
            $this->fullPapers->add($fullPaper);
        }

        return $this;
    }


    /**
     * Remove FullPapers
     *
     * @param FullPaper $fullPaper
     */
    public function removeFullPaper(FullPaper $fullPaper)
    {
        $this->fullPapers->removeElement($fullPaper);
    }

    /**
     * Add CameraReadyPapers
     *
     * @param CameraReadyPaper $cameraReadyPaper
     *
     * @return Paper
     */
    public function addCameraReadyPaper(CameraReadyPaper $cameraReadyPaper)
    {

        $cameraReadyPaper->setPaper($this);

        if (!$this->getCameraReadyPapers()->contains($cameraReadyPaper)) {
            $this->cameraReadyPapers->add($cameraReadyPaper);
        }
        return $this;
    }


    /**
     * Remove CameraReadyPapers
     *
     * @param CameraReadyPaper $cameraReadyPaper
     */
    public function removeCameraReadyPaper(CameraReadyPaper $cameraReadyPaper)
    {
        $this->cameraReadyPapers->removeElement($cameraReadyPaper);
    }

    /**
     * Add AuthorAllocations
     *
     * @param AuthorAllocation $authorAllocations
     *
     * @return Paper
     */
    public function addAuthorAllocation(AuthorAllocation $authorAllocations)
    {

        $authorAllocations->setPaper($this);

        if (!$this->getAuthorAllocations()->contains($authorAllocations)) {
            $this->authorAllocations->add($authorAllocations);
        }

        return $this;
    }


    /**
     * Remove AuthorAllocations
     *
     * @param AuthorAllocation $authorAllocations
     */
    public function removeAuthorAllocation(AuthorAllocation $authorAllocations)
    {
        $this->authorAllocations->removeElement($authorAllocations);
    }


    /**
     * Add Keywords
     *
     * @param Keyword $keywords
     *
     * @return Paper
     */
    public function addKeywordn(Keyword $keywords)
    {

        $keywords->setPaper($this);

        if (!$this->getKeywords()->contains($keywords)) {
            $this->keywords->add($keywords);
        }

        return $this;
    }

    /**
     * Remove Keywords
     *
     * @param Keyword $keywords
     */
    public function removeKeyword(Keyword $keywords)
    {
        $this->keywords->removeElement($keywords);
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->title;
    }

}
