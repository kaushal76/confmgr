<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AuthorAllocation
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="author_paper_allocations")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AuthorAllocationRepository")
 */
class AuthorAllocation {

    /**
     *
     * @var
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Paper", inversedBy="authorAllocations")
     * @ORM\JoinColumn(name="paper", referencedColumnName="id")
     *
     */
    protected $paper;

    /**
     *
     * @var
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Author", inversedBy="paperAllocations")
     * @ORM\JoinColumn(name="author", referencedColumnName="id")
     */
    protected $author;

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
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

}