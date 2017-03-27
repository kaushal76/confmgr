<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Theme
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="themes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ThemeRepository")
 */
class Theme {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(type="string")
     *
     */
    protected $title;

    /**
     * @ORM\Column(type="text")
     *
     */
    protected $description;

    /**
     * One Theme has many themeLeaderAllocations
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\LeaderAllocation", mappedBy="theme", cascade={"persist"})
     */
    protected $leaderAllocations;

    /**
     * constructor
     */
    public function __construct()
    {
        $this->leaderAllocations = new ArrayCollection();
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getLeaderAllocations()
    {
        return $this->leaderAllocations;
    }

    /**
     * @param mixed $leaderAllocations
     */
    public function setLeaderAllocations($leaderAllocations)
    {
        $this->leaderAllocations = $leaderAllocations;
    }

    /**
     * Add LeaderAllocation
     * @param LeaderAllocation $leaderAllocations
     * @return Theme
     */
    public function addLeaderAllocation(LeaderAllocation $leaderAllocations)
    {

        $leaderAllocations->setTheme($this);

        if (!$this->getLeaderAllocations()->contains($leaderAllocations)) {
            $this->leaderAllocations->add($leaderAllocations);
        }
        return $this;
    }


    /**
     * Remove LeaderAllocation
     * @param LeaderAllocation $leaderAllocations
     */
    public function removeLeaderAllocation(LeaderAllocation $leaderAllocations)
    {
        $this->leaderAllocations->removeElement($leaderAllocations);
    }

}
