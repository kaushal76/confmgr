<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class LeaderAllocation
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="leader_theme_allocations")
 *
 */
class LeaderAllocation {

    /**
     *
     * @var
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Theme", inversedBy="leaderAllocations")
     * @ORM\JoinColumn(name="theme_id", referencedColumnName="id")
     *
     */
    protected $theme;

    /**
     *
     * @var
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="leader_id", referencedColumnName="id")
     */
    protected $leader;

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
    public function getLeader()
    {
        return $this->leader;
    }

    /**
     * @param mixed $leader
     */
    public function setLeader($leader)
    {
        $this->leader = $leader;
    }

}
