<?php

namespace App\Entity;

use App\Repository\LieuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LieuRepository::class)
 */
class Lieu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $rue;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * @var ArrayCollection
     *@ORM\OneToMany (targetEntity="App\Entity\Ville", mappedBy="lieux")
     */
    private $ville;

    /**
     * @return ArrayCollection
     */
    public function getVille(): ArrayCollection
    {
        return $this->ville;
    }

    /**
     * @param ArrayCollection $ville
     */
    public function setVille(ArrayCollection $ville): void
    {
        $this->ville = $ville;
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
     * @var ArrayCollection
     * @ORM\OneToMany  (targetEntity="App\Entity\Sortie", mappedBy="lieu")
     */
    private $sorties;

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
     * @param string|null $nom
     * @return $this
     */
    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRue(): ?string
    {
        return $this->rue;
    }

    /**
     * @param string|null $rue
     * @return $this
     */
    public function setRue(?string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @param float|null $latitude
     * @return $this
     */
    public function setLatitude(?float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return $this
     */
    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }
}
