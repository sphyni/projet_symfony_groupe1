<?php

namespace App\Entity;

use App\Repository\ParticipantRepository;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @var ArrayCollection
     * @ORM\OneToMany (targetEntity="App\Entity\Sortie", mappedBy="participant")
     */
    private $sortie;

    /**
     * @return ArrayCollection
     */
    public function getSortie(): ArrayCollection
    {
        return $this->sortie;
    }

    /**
     * @param ArrayCollection $sortie
     */
    public function setSortie(ArrayCollection $sortie): void
    {
        $this->sortie = $sortie;
    }



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
    }

    /**
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->Nom;
    }

    /**
     * @param string $Nom
     * @return $this
     */
    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    /**
     * @param string $Prenom
     * @return $this
     */
    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     * @return $this
     */
    public function setTelephone(string $telephone): self
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
    public function setMail(string $Mail): self
    {
        $this->Mail = $Mail;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsAdmin(): ?bool
    {
        return $this->isAdmin;
    }

    /**
     * @param bool $isAdmin
     * @return $this
     */
    public function setIsAdmin(bool $isAdmin): self
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsActif(): ?bool
    {
        return $this->isActif;
    }

    /**
     * @param bool $isActif
     * @return $this
     */
    public function setIsActif(bool $isActif): self
    {
        $this->isActif = $isActif;

        return $this;
    }
}
