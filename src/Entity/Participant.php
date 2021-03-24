<?php

namespace App\Entity;

use App\Repository\ParticipantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParticipantRepository::class)
 */
class Participant extends User
{

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Mail;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAdmin;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActif;

    /**
     * @var Site
     * @ORM\ManyToOne (targetEntity="App\Entity\Site", inversedBy="participants")
     */
    private $site;

    /**
     * @return Site
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param Site $site
     */
    public function setSite( $site)
    {
        $this->site = $site;
        return $this;
    }


    /**
     * @return string|null
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @param string $Nom
     * @return $this
     */
    public function setNom(string $Nom)
    {
        $this->Nom = $Nom;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * @param string $Prenom
     * @return $this
     */
    public function setPrenom(string $Prenom)
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     * @return $this
     */
    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMail(): ?string
    {
        return $this->Mail;
    }

    /**
     * @param string $Mail
     * @return $this
     */
    public function setMail(string $Mail)
    {
        $this->Mail = $Mail;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param bool $isAdmin
     * @return $this
     */
    public function setIsAdmin(bool $isAdmin)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsActif()
    {
        return $this->isActif;
    }

    /**
     * @param bool $isActif
     * @return $this
     */
    public function setIsActif(bool $isActif)
    {
        $this->isActif = $isActif;

        return $this;
    }
}
