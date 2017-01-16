<?php

namespace Rindra\NotificationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rindra\NotificationBundle\Entity\MessageRepository")
 */
class Message
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=255)
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Rindra\UserBundle\Entity\Utilisateur")
     */
    private $expediteur;

    /**
     * @var
     *
     * @ORM\ManyToMany(targetEntity="Rindra\UserBundle\Entity\Utilisateur")
     */
    private $destinataires;

    public function __construct()
    {
        $this->destinataires = new ArrayCollection();
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
     * Set sujet
     *
     * @param string $sujet
     * @return Message
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string 
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Message
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Message
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set expediteur
     *
     * @param \Rindra\UserBundle\Entity\Utilisateur $expediteur
     * @return Message
     */
    public function setExpediteur(\Rindra\UserBundle\Entity\Utilisateur $expediteur = null)
    {
        $this->expediteur = $expediteur;

        return $this;
    }

    /**
     * Get expediteur
     *
     * @return \Rindra\UserBundle\Entity\Utilisateur 
     */
    public function getExpediteur()
    {
        return $this->expediteur;
    }

    /**
     * Add destinataires
     *
     * @param \Rindra\UserBundle\Entity\Utilisateur $destinataires
     * @return Message
     */
    public function addDestinataire(\Rindra\UserBundle\Entity\Utilisateur $destinataires)
    {
        $this->destinataires[] = $destinataires;

        return $this;
    }

    /**
     * Remove destinataires
     *
     * @param \Rindra\UserBundle\Entity\Utilisateur $destinataires
     */
    public function removeDestinataire(\Rindra\UserBundle\Entity\Utilisateur $destinataires)
    {
        $this->destinataires->removeElement($destinataires);
    }

    /**
     * Get destinataires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDestinataires()
    {
        return $this->destinataires;
    }
}
