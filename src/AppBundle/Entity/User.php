<?php

/*
 * This file is part of the Nao-API project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Class User
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * @ORM\Entity
 *
 * @ApiResource
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    private $firstname;

    private $lastname;

    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=150, nullable=true)
     */
    private $username;

    private $password;

    /**
     * @var Observations
     *
     * @ORM\OneToMany(targetEntity="Observations", mappedBy="author")
     */
    private $observations;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->observations = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Add observation
     *
     * @param \AppBundle\Entity\Observations $observation
     *
     * @return User
     */
    public function addObservation(Observations $observation)
    {
        $this->observations[] = $observation;

        return $this;
    }

    /**
     * Remove observation
     *
     * @param \AppBundle\Entity\Observations $observation
     */
    public function removeObservation(Observations $observation)
    {
        $this->observations->removeElement($observation);
    }

    /**
     * Get observations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObservations()
    {
        return $this->observations;
    }
}
