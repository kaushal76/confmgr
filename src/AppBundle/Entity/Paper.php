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
     * One Paper has many PaperAbstracts
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
     * One paper has Many AuthorAllocations
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
    public function getKeywordAllocations()
    {
        return $this->keywordAllocations;
    }

    /**
     * @param mixed $keywordAllocations
     */
    public function setKeywordAllocations($keywordAllocations)
    {
        $this->keywordAllocations = $keywordAllocations;
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
     * Add KeywordAllocations
     * @param KeywordAllocation $keywordAllocation
     * @return Paper
     */
    public function addKeywordAllocation(KeywordAllocation $keywordAllocation)
    {

        $keywordAllocation->setKeyword($this);

        if (!$this->getKeywordAllocations()->contains($keywordAllocation)) {
            $this->keywordAllocations->add($keywordAllocation);
        }
        return $this;
    }

    /**
     * Remove KeywordAllocations
     * @param KeywordAllocation $keywordAllocation
     */
    public function removeKeywordAllocation(KeywordAllocation $keywordAllocation)
    {
        $this->keywordAllocations->removeElement($keywordAllocation);
    }

    /**
     * Add PaperAbstracts
     * @param PaperAbstract $paperAbstract
     * @return Paper
     */
    public function addPaperAbstract(PaperAbstract $paperAbstract)
    {

        $paperAbstract->setPaper($this);

        if (!$this->getPaperAbstracts()->contains($paperAbstract)){
            $this->paperAbstracts->add($paperAbstract);
        }
        return $this;
    }

    /**
     * Remove PaperAbstract
     * @param PaperAbstract $paperAbstract
     */
    public function removePaperAbstract(PaperAbstract $paperAbstract)
    {
        $this->paperAbstracts->removeElement($paperAbstract);
    }

    /**
     * Add FullPapers
     * @param FullPaper $fullPaper
     * @return Paper
     */
    public function addFullPaper(FullPaper $fullPaper)
    {

        $fullPaper->setPaper($this);

        if (!$this->getFullPapers()->contains($fullPaper)){
            $this->fullPapers->add($fullPaper);
        }
        return $this;
    }

    /**
     * Remove FullPaper
     * @param FullPaper $fullPaper
     */
    public function removeFullPaper(FullPaper $fullPaper)
    {
        $this->fullPapers->removeElement($fullPaper);
    }

    /**
     * Add CameraReadyPapers
     * @param CameraReadyPaper $cameraReadyPaper
     * @return Paper
     */
    public function addCameraReadyPaper(CameraReadyPaper $cameraReadyPaper)
    {

        $cameraReadyPaper->setPaper($this);

        if (!$this->getCameraReadyPapers()->contains($cameraReadyPaper)){
            $this->cameraReadyPapers->add($cameraReadyPaper);
        }
        return $this;
    }

    /**
     * Remove CameraReadyPaper
     * @param CameraReadyPaper $cameraReadyPaper
     */
    public function removeCameraReadyPaper(CameraReadyPaper $cameraReadyPaper)
    {
        $this->cameraReadyPapers->removeElement($cameraReadyPaper);
    }

    /**
     * Add AuthorAllocations
     * @param AuthorAllocation $authorAllocation
     * @return Paper
     */
    public function addAuthorAllocation(AuthorAllocation $authorAllocation)
    {

        $authorAllocation->setPaper($this);

        if (!$this->getAuthorAllocations()->contains($authorAllocation)){
            $this->authorAllocations->add($authorAllocation);
        }
        return $this;
    }

    /**
     * Remove AuthorAllocations
     * @param AuthorAllocation $authorAllocation
     */
    public function removeAuthorAllocation(AuthorAllocation $authorAllocation)
    {
        $this->authorAllocations->removeElement($authorAllocation);
    }

    /**
     * Add ReviewerAllocations
     * @param ReviewerAllocation $reviewerAllocation
     * @return Paper
     */
    public function addReviewerAllocation(ReviewerAllocation $reviewerAllocation)
    {

        $reviewerAllocation->setPaper($this);

        if (!$this->getReviewerAllocations()->contains($reviewerAllocation)){
            $this->reviewerAllocations->add($reviewerAllocation);
        }
        return $this;
    }

    /**
     * Remove ReviewerAllocation
     * @param ReviewerAllocation $reviewerAllocation
     */
    public function removeReviewerAllocation(ReviewerAllocation $reviewerAllocation)
    {
        $this->reviewerAllocations->removeElement($reviewerAllocation);
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->title;
    }

}
