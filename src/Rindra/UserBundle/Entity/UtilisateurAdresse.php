<?php

namespace Rindra\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UtilisateurAdresse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Rindra\UserBundle\Entity\UtilisateurAdresseRepository")
 */
class UtilisateurAdresse
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var object
     *
     * @ORM\ManyToOne(targetEntity="Rindra\UserBundle\Entity\Adresse", inversedBy="utlisateurAdresses", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $adresse;

    /**
     * @var object
     *
     * @ORM\ManyToOne(targetEntity="Rindra\UserBundle\Entity\Utilisateur", inversedBy="utilisateurAdresses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

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
     * Set type
     *
     * @param string $type
     * @return UtilisateurAdresse
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set adresse
     *
     * @param \Rindra\UserBundle\Entity\Adresse $adresse
     * @return UtilisateurAdresse
     */
    public function setAdresse(\Rindra\UserBundle\Entity\Adresse $adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return \Rindra\UserBundle\Entity\Adresse 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set utilisateur
     *
     * @param \Rindra\UserBundle\Entity\Utilisateur $utilisateur
     * @return UtilisateurAdresse
     */
    public function setUtilisateur(\Rindra\UserBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \Rindra\UserBundle\Entity\Utilisateur 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
