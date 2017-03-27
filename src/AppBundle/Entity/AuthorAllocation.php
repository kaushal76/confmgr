<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
<<<<<<< HEAD
=======
use Doctrine\Common\Collections\ArrayCollection;
>>>>>>> origin/master

/**
 * Class AuthorAllocation
 * @package AppBundle\Entity
 * @ORM\Entity
<<<<<<< HEAD
 * @ORM\Table(name="author_paper_allocations")
=======
 * @ORM\Table(name="author_allocations")
>>>>>>> origin/master
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AuthorAllocationRepository")
 */
class AuthorAllocation {

    /**
     *
     * @var
     * @ORM\Id
<<<<<<< HEAD
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Paper", inversedBy="authorAllocations")
     * @ORM\JoinColumn(name="paper", referencedColumnName="id")
     *
     */
    protected $paper;
=======
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Author", inversedBy="paperAllocations")
     * @ORM\JoinColumn(name="author", referencedColumnName="id")
     */
    protected $author;
>>>>>>> origin/master

    /**
     *
     * @var
     * @ORM\Id
<<<<<<< HEAD
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Author", inversedBy="paperAllocations")
     * @ORM\JoinColumn(name="author", referencedColumnName="id")
     */
    protected $author;
=======
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Paper", inversedBy="authorAllocations")
     * @ORM\JoinColumn(name="paper", referencedColumnName="id")
     */
    protected $paper;
>>>>>>> origin/master

    /**
     * @return mixed
     */
<<<<<<< HEAD
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
=======
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
>>>>>>> origin/master
    }

    /**
     * @return mixed
     */
<<<<<<< HEAD
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
=======
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
>>>>>>> origin/master
    }

}
