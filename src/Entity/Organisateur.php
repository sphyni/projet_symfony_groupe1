<?php

namespace App\Entity;

use App\Repository\OrganisateurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrganisateurRepository::class)
 */
class Organisateur extends Participant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isOrganisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsOrganisateur(): ?bool
    {
        return $this->isOrganisateur;
    }

    public function setIsOrganisateur(bool $isOrganisateur): self
    {
        $this->isOrganisateur = $isOrganisateur;

        return $this;
    }
}
