<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Author
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="keywords")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\KeywordRepository")
 */
class Keyword {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * One Keyword has many KeywordAllocations
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\KeywordAllocation", mappedBy="keyword", cascade={"persist"})
     */
    protected $keywordAllocations;


    /**
     * constructor
     */
    public function __construct()
    {
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
}
