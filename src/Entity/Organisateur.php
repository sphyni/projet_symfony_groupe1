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
     * @ORM\Column(type="boolean")
     */
    private $isOrganisateur;


    /**
     * @return bool|null
     */
    public function getIsOrganisateur(): ?bool
    {
        return $this->isOrganisateur;
    }

    /**
     * @param bool $isOrganisateur
     * @return $this
     */
    public function setIsOrganisateur(bool $isOrganisateur): self
    {
        $this->isOrganisateur = $isOrganisateur;

        return $this;
    }
}
