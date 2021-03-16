<?php

namespace App\Entity;

use App\Repository\ParticipantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParticipantRepository::class)
 */
class Participant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAdministrateur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActif;

    /**
     * @return Site
     */
    public function getSite(): Site
    {
        return $this->site;
    }

    /**
     * @param Site $site
     */
    public function setSite(Site $site): void
    {
        $this->site = $site;
    }

    /**
     * @return ArrayCollection
     */
    public function getSorties(): ArrayCollection
    {
        return $this->sorties;
    }

    /**
     * @param ArrayCollection $sorties
     */
    public function setSorties(ArrayCollection $sorties): void
    {
        $this->sorties = $sorties;
    }

    /**
     * @return Participant
     */
    public function getSortiesOrganises(): Participant
    {
        return $this->sortiesOrganises;
    }

    /**
     * @param Participant $sortiesOrganises
     */
    public function setSortiesOrganises(Participant $sortiesOrganises): void
    {
        $this->sortiesOrganises = $sortiesOrganises;
    }

    /**
     * @var Site
     * @ORM\ManyToOne   (targetEntity="App\Entity\Site", inversedBy="participants")
     */
    private $site;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="App\Entity\Sortie", mappedBy="inscrits")
     */
    private $sorties;

    /**
     * @var Participant
     * @ORM\ManyToOne  (targetEntity="App\Entity\Sortie", inversedBy="organisateur")
     */
    private $sortiesOrganises;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->prenom = $pseudo;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->prenom = $password;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getIsAdministrateur(): ?bool
    {
        return $this->isAdministrateur;
    }

    public function setIsAdministrateur(bool $isAdministrateur): self
    {
        $this->isAdministrateur = $isAdministrateur;

        return $this;
    }

    public function getIsActif(): ?bool
    {
        return $this->isActif;
    }

    public function setIsActif(string $isActif): self
    {
        $this->isActif = $isActif;

        return $this;
    }

    public function getSalt() {
        return null;
    }

    public function eraseCredentials() {
        return null;
    }

    public function getRoles() {
        return ['ROLE_USER'];
    }



}
