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
     */
    private $lieux;


    public function getLieux()
    {
        return $this->lieux;
    }


    public function setLieux($lieux) {
        $this->lieux = $lieux;
    }



    public function getId()
    {
        return $this->id;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
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
