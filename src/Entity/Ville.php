<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VilleRepository::class)
 */
class Ville
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $codePostal;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany  (targetEntity="App\Entity\Lieu", mappedBy="ville")
     * @Assert\Type(type="App\Entity\Etat")
     * @Assert\Valid
     */
    private $lieux;

    /**
     * @return ArrayCollection
     */
    public function getLieux(): ?ArrayCollection
    {
        return $this->lieux;
    }

    /**
     * @param ArrayCollection $lieux
     */
    public function setLieux(?ArrayCollection $lieux): void
    {
        $this->lieux = $lieux;
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


    public function getCodePostal()
    {
        return $this->codePostal;
    }


    public function setCodePostal( $codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getNom();
    }
}
