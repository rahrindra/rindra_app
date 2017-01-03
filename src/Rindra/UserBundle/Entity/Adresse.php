<?php

namespace Rindra\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adresse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rindra\UserBundle\Entity\AdresseRepository")
 */
class Adresse
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
     * @ORM\Column(name="voie", type="string", length=255)
     */
    private $voie;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postale", type="string", length=255)
     */
    private $codePostale;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    private $pays;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Rindra\UserBundle\Entity\UtilisateurAdresse", mappedBy="adresse", cascade={"persist"})
     */
    private $utilisateurAdresses;


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
     * Set voie
     *
     * @param string $voie
     * @return Adresse
     */
    public function setVoie($voie)
    {
        $this->voie = $voie;

        return $this;
    }

    /**
     * Get voie
     *
     * @return string 
     */
    public function getVoie()
    {
        return $this->voie;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     * @return Adresse
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string 
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set codePostale
     *
     * @param string $codePostale
     * @return Adresse
     */
    public function setCodePostale($codePostale)
    {
        $this->codePostale = $codePostale;

        return $this;
    }

    /**
     * Get codePostale
     *
     * @return string 
     */
    public function getCodePostale()
    {
        return $this->codePostale;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return Adresse
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->utilisateurAdresses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add utilisateurAdresses
     *
     * @param \Rindra\UserBundle\Entity\UtilisateurAdresse $utilisateurAdresses
     * @return Adresse
     */
    public function addUtilisateurAdress(\Rindra\UserBundle\Entity\UtilisateurAdresse $utilisateurAdresses)
    {
        $this->utilisateurAdresses[] = $utilisateurAdresses;

        $utilisateurAdresses->setAdresse($this);

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

        return $this;
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
