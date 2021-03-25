<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SiteRepository::class)
 */
class Site
{

    public function __toString():string{
        return $this->getNom();
    }

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
     * @var ArrayCollection
     * @ORM\OneToMany (targetEntity="App\Entity\Sortie", mappedBy="site")
     */
    private $sorties;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany  (targetEntity="App\Entity\Participant", mappedBy="site")
     */
    private $participants;

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
     * @return ArrayCollection
     */
    public function getParticipants(): ArrayCollection
    {
        return $this->participants;
    }

    /**
     * @param  $participants
     */
    public function setParticipants( $participants)
    {
        $this->participants = $participants;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return $this
     */
    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

}
