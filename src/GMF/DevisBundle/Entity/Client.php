<?php

namespace GMF\DevisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="GMF\DevisBundle\Repository\ClientRepository")
 */
class Client
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
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=255, nullable=true)
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="siret", type="string", length=255, nullable=true)
     */
    private $siret;

    /**
    * @ORM\OneToOne(targetEntity="GMF\DevisBundle\Entity\Contact" cascade={"persist"})
    */
    private $contact;


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
     * Set surname.
     *
     * @param string $surname
     *
     * @return Client
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname.
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Client
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set company.
     *
     * @param string $company
     *
     * @return Client
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company.
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set siret.
     *
     * @param string $siret
     *
     * @return Client
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get siret.
     *
     * @return string
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set idContact.
     *
     * @param string $idContact
     *
     * @return Client
     */
    public function setIdContact($idContact)
    {
        $this->idContact = $idContact;

        return $this;
    }

    /**
     * Get idContact.
     *
     * @return string
     */
    public function getIdContact()
    {
        return $this->idContact;
    }

    /**
     * Set devis.
     *
     * @param \GMF\DevisBundle\Entity\Devis $devis
     *
     * @return Client
     */
    public function setDevis(\GMF\DevisBundle\Entity\Devis $devis)
    {
        $this->devis = $devis;

        return $this;
    }

    /**
     * Get devis.
     *
     * @return \GMF\DevisBundle\Entity\Devis
     */
    public function getDevis()
    {
        return $this->devis;
    }

    /**
     * Set contact.
     *
     * @param \GMF\DevisBundle\Entity\Contact|null $contact
     *
     * @return Client
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
