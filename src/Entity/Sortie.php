<?php

namespace App\Entity;

use App\Repository\SortieRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=SortieRepository::class)
 */
class Sortie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateLimiteInscription;

    /**
     * @ORM\Column(type="time")
     */
    private $duree;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateHeureDebut;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbInscriptionsMax;

    /**
     * @ORM\Column(type="text")
     */
    private $infosSortie;

    /**
     * @ORM\Column(type="boolean")
     */
    private $historique;

    /**
     * @var Etat
     * @ORM\ManyToOne (targetEntity="App\Entity\Etat", inversedBy="sorties", cascade={"persist"})
     * @Assert\Type(type="App\Entity\Etat")
     * @Assert\Valid
     */
    private $etat;

    /**
     * @var Lieu
     * @ORM\ManyToOne  (targetEntity="App\Entity\Lieu", inversedBy="sorties", cascade={"persist"})
     * @Assert\Type(type="App\Entity\Etat")
     * @Assert\Valid
     */
    private $lieu;

    /**
     * @var Site
     * @ORM\ManyToOne  (targetEntity="App\Entity\Site", inversedBy="sorties", cascade={"persist"})
     * @Assert\Type(type="App\Entity\Etat")
     * @Assert\Valid
     */
    private $site;



    /**
     * @return Etat
     */
    public function getEtat(): ?Etat
    {
        return $this->etat;
    }

    /**
     * @param Etat $etat
     */
    public function setEtat(?Etat $etat): void
    {
        $this->etat = $etat;
    }

    /**
     * @return Lieu
     */
    public function getLieu(): ?Lieu
    {
        return $this->lieu;
    }

    /**
     * @param Lieu $lieu
     */
    public function setLieu(?Lieu $lieu): void
    {
        $this->lieu = $lieu;
    }

    /**
     * @return Site
     */
    public function getSite(): ?Site
    {
        return $this->site;
    }

    /**
     * @param Site $site
     */
    public function setSite(?Site $site): void
    {
        $this->site = $site;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return $this
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateLimiteInscription(): ?\DateTimeInterface
    {
        return $this->dateLimiteInscription;
    }

    /**
     * @param \DateTimeInterface $dateLimiteInscription
     * @return $this
     */
    public function setDateLimiteInscription(\DateTimeInterface $dateLimiteInscription): self
    {
        $this->dateLimiteInscription = $dateLimiteInscription;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    /**
     * @param \DateTimeInterface $duree
     * @return $this
     */
    public function setDuree(\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateHeureDebut(): ?\DateTimeInterface
    {
        return $this->dateHeureDebut;
    }

    /**
     * @param \DateTimeInterface $dateHeureDebut
     * @return $this
     */
    public function setDateHeureDebut(\DateTimeInterface $dateHeureDebut): self
    {
        $this->dateHeureDebut = $dateHeureDebut;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNbInscriptionsMax(): ?int
    {
        return $this->nbInscriptionsMax;
    }

    /**
     * @param int $nbInscriptionsMax
     * @return $this
     */
    public function setNbInscriptionsMax(int $nbInscriptionsMax): self
    {
        $this->nbInscriptionsMax = $nbInscriptionsMax;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInfosSortie(): ?string
    {
        return $this->infosSortie;
    }

    /**
     * @param string $infosSortie
     * @return $this
     */
    public function setInfosSortie(string $infosSortie): self
    {
        $this->infosSortie = $infosSortie;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHistorique(): ?bool
    {
        return $this->historique;
    }

    /**
     * @param bool $historique
     * @return $this
     */
    public function setHistorique(bool $historique): self
    {
        $this->historique = $historique;

        return $this;
    }
}
