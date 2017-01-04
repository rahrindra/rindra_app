<?php

namespace Rindra\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Entity\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity
 */
class Utilisateur extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(name="prenoms", type="string", length=255)
     */
    private $prenoms;

    /**
     * @ORM\OneToOne(targetEntity="Rindra\UserBundle\Entity\Image", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $image;

    /**
     * @var object
     *
     * @ORM\OneToMany(targetEntity="Rindra\UserBundle\Entity\UtilisateurAdresse", mappedBy="utilisateur", cascade={"persist"})
     */
    private $utilisateurAdresses;

    public function __construct()
    {
        parent::__construct();
        $this->utilisateurAdresses = new ArrayCollection();
    }

    /**
     * Set image
     *
     * @param \Rindra\UserBundle\Entity\Image $image
     * @return Utilisateur
     */
    public function setImage(\Rindra\UserBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Rindra\UserBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenoms
     *
     * @param string $prenoms
     * @return Utilisateur
     */
    public function setPrenoms($prenoms)
    {
        $this->prenoms = $prenoms;

        return $this;
    }

    /**
     * Get prenoms
     *
     * @return string 
     */
    public function getPrenoms()
    {
        return $this->prenoms;
    }

    /**
     * Add utilisateurAdresses
     *
     * @param \Rindra\UserBundle\Entity\UtilisateurAdresse $utilisateurAdresses
     * @return Utilisateur
     */
    public function addUtilisateurAdress(\Rindra\UserBundle\Entity\UtilisateurAdresse $utilisateurAdresses)
    {
        $this->utilisateurAdresses[] = $utilisateurAdresses;

        // On lie l'adresse à l'utilisateur
        $utilisateurAdresses->setUtilisateur($this);

        return $this;
    }

    /**
     * Remove utilisateurAdresses
     *
     * @param \Rindra\UserBundle\Entity\UtilisateurAdresse $utilisateurAdresses
     */
    public function removeUtilisateurAdress(\Rindra\UserBundle\Entity\UtilisateurAdresse $utilisateurAdresses)
    {
        $this->utilisateurAdresses->removeElement($utilisateurAdresses);
    }

    /**
     * Get utilisateurAdresses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUtilisateurAdresses()
    {
        return $this->utilisateurAdresses;
    }
}
