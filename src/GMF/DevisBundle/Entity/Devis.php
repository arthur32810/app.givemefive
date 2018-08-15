<?php

namespace GMF\DevisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * devis
 *
 * @ORM\Table(name="devis")
 * @ORM\Entity(repositoryClass="GMF\DevisBundle\Repository\devisRepository")
 */
class Devis
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deadline", type="date")
     */
    private $deadline;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=255, unique=true)
     */
    private $numero;

    /**
    * @ORM\OneToOne(targetEntity="GMF\DevisBundle\Entity\Contact", cascade={"persist"})
    * @ORM\JoinColumn(nullable=false)
    */
    private $contact;

    /**
    * @ORM\OneToOne(targetEntity="GMF\DevisBundle\Entity\Modules", cascade={"persist"})
    * @ORM\JoinColumn(nullable=false)
    */
    private $modules;


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
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return devis
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set deadline.
     *
     * @param \DateTime $deadline
     *
     * @return devis
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * Get deadline.
     *
     * @return \DateTime
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set numero.
     *
     * @param string $numero
     *
     * @return devis
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero.
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set devis.
     *
     * @param string $devis
     *
     * @return devis
     */
    public function setDevis($devis)
    {
        $this->devis = $devis;

        return $this;
    }

    /**
     * Get devis.
     *
     * @return string
     */
    public function getDevis()
    {
        return $this->devis;
    }

    /**
     * Set idClient.
     *
     * @param int $idClient
     *
     * @return devis
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get idClient.
     *
     * @return int
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set urlDevis.
     *
     * @param string $urlDevis
     *
     * @return Devis
     */
    public function setUrlDevis($urlDevis)
    {
        $this->url_devis = $urlDevis;

        return $this;
    }

    /**
     * Get urlDevis.
     *
     * @return string
     */
    public function getUrlDevis()
    {
        return $this->url_devis;
    }

    /**
     * Set client.
     *
     * @param \GMF\DevisBundle\Entity\Client|null $client
     *
     * @return Devis
     */
    public function setClient(\GMF\DevisBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client.
     *
     * @return \GMF\DevisBundle\Entity\Client|null
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set modules.
     *
     * @param \GMF\DevisBundle\Entity\Modules|null $modules
     *
     * @return Devis
     */
    public function setModules(\GMF\DevisBundle\Entity\Modules $modules = null)
    {
        $this->modules = $modules;

        return $this;
    }

    /**
     * Get modules.
     *
     * @return \GMF\DevisBundle\Entity\Modules|null
     */
    public function getModules()
    {
        return $this->modules;
    }

    /**
     * Set contact.
     *
     * @param \GMF\DevisBundle\Entity\Contact|null $contact
     *
     * @return Devis
     */
    public function setContact(\GMF\DevisBundle\Entity\Contact $contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact.
     *
     * @return \GMF\DevisBundle\Entity\Contact|null
     */
    public function getContact()
    {
        return $this->contact;
    }
}
