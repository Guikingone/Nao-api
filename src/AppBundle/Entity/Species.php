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
 * Class Species
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * @ORM\Entity
 *
 * @ApiResource
 */
class Species
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Observations
     *
     * @ORM\OneToMany(targetEntity="Observations", mappedBy="species")
     */
    private $observations;

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
     * Constructor
     */
    public function __construct()
    {
        $this->observations = new ArrayCollection();
    }

    /**
     * Add observation
     *
     * @param \AppBundle\Entity\Observations $observation
     *
     * @return Species
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
