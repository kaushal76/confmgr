<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class KeywordAllocation
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="keyword_paper_allocations")
 *
 */
class KeywordAllocation {

    /**
     *
     * @var
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Paper", inversedBy="keywordAllocations")
     * @ORM\JoinColumn(name="paper_id", referencedColumnName="id")
     *
     */
    protected $paper;

    /**
     *
     * @var
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Keyword", inversedBy="keywordAllocations")
     * @ORM\JoinColumn(name="keyword_id", referencedColumnName="id")
     */
    protected $keyword;

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
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * @param mixed $keyword
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    }

}
