<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Author
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="authors")
 *
 */
class Author {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * One Author has Many authorAllocations
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\AuthorAllocation", mappedBy="author", cascade={"persist"})
     */
    protected $authorAllocations;

    /**
     * One Author has one User
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * constructor
     */
    public function __construct()
    {
        $this->authorAllocations = new ArrayCollection();
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
    public function getAuthorAllocations()
    {
        return $this->authorAllocations;
    }

    /**
     * @param mixed $paperAllocations
     */
    public function setAuthorAllocations($authorAllocations)
    {
        $this->authorAllocations = $authorAllocations;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * Add AuthorAllocations
     *
     * @param AuthorAllocation $authorAllocations
     *
     * @return Author
     */
    public function addAuthorAllocation(AuthorAllocation $authorAllocation)
    {
        $authorAllocation->setAuthor($this);

        if (!$this->getAuthorAllocations()->contains($authorAllocation)) {
            $this->authorAllocations->add($authorAllocation);
        }

        return $this;
    }

    /**
     * Remove AuthorAllocations
     *
     * @param AuthorAllocation $authorAllocations
     */
    public function removeAuthorAllocation(AuthorAllocation $authorAllocation)
    {
        $this->authorAllocations->removeElement($authorAllocation);
    }

    public function __toString()
    {
        $name = $this->getUser();
        return $name->getTitle().' '.$name->getFirstname().' '.$name->getSurname();;
    }


}
