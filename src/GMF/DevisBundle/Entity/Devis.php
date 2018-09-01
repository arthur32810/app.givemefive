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
    * @ORM\Column(name="enabled", type="boolean")
    */
    private $enabled;


    /**
    * @ORM\OneToOne(targetEntity="GMF\DevisBundle\Entity\Contact", cascade={"persist"})
    * @ORM\JoinColumn(nullable=false)
    */
    private $contact;

    /**
    * @ORM\ManyToMany(targetEntity="GMF\DevisBundle\Entity\Modules", cascade={"persist"})
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->modules = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add module.
     *
     * @param \GMF\DevisBundle\Entity\Modules $module
     *
     * @return Devis
     */
    public function addModule(\GMF\DevisBundle\Entity\Modules $module)
    {
        $this->modules[] = $module;

        return $this;
    }

    /**
     * Remove module.
     *
     * @param \GMF\DevisBundle\Entity\Modules $module
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeModule(\GMF\DevisBundle\Entity\Modules $module)
    {
        return $this->modules->removeElement($module);
    }

    /**
     * Set enabled.
     *
     * @param bool $enabled
     *
     * @return Devis
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled.
     *
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }
}
