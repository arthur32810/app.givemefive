<?php

namespace GMF\DevisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modules
 *
 * @ORM\Table(name="modules")
 * @ORM\Entity(repositoryClass="GMF\DevisBundle\Repository\ModulesRepository")
 */
class Modules
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="fidelite", type="boolean", nullable=true)
     */
    private $fidelite;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="reservation", type="boolean", nullable=true)
     */
    private $reservation;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="vente", type="boolean", nullable=true)
     */
    private $vente;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="carte", type="boolean", nullable=true)
     */
    private $carte;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fidelite.
     *
     * @param bool|null $fidelite
     *
     * @return Modules
     */
    public function setFidelite($fidelite = null)
    {
        $this->fidelite = $fidelite;

        return $this;
    }

    /**
     * Get fidelite.
     *
     * @return bool|null
     */
    public function getFidelite()
    {
        return $this->fidelite;
    }

    /**
     * Set reservation.
     *
     * @param bool|null $reservation
     *
     * @return Modules
     */
    public function setReservation($reservation = null)
    {
        $this->reservation = $reservation;

        return $this;
    }

    /**
     * Get reservation.
     *
     * @return bool|null
     */
    public function getReservation()
    {
        return $this->reservation;
    }

    /**
     * Set vente.
     *
     * @param bool|null $vente
     *
     * @return Modules
     */
    public function setVente($vente = null)
    {
        $this->vente = $vente;

        return $this;
    }

    /**
     * Get vente.
     *
     * @return bool|null
     */
    public function getVente()
    {
        return $this->vente;
    }

    /**
     * Set carte.
     *
     * @param bool|null $carte
     *
     * @return Modules
     */
    public function setCarte($carte = null)
    {
        $this->carte = $carte;

        return $this;
    }

    /**
     * Get carte.
     *
     * @return bool|null
     */
    public function getCarte()
    {
        return $this->carte;
    }
}
