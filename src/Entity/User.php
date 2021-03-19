<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
<<<<<<< HEAD
 * @ORM\Entity()
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"participant"="Participant", "organisateur" = "Organisateur"})
=======
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
>>>>>>> f0e45f07e191f70c7789ed7e709f90cb45db72ab
 */
abstract class User implements UserInterface
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
    private $username;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $password;
    private $roles;

    public function getId()
    {
        return $this->id;
    }

<<<<<<< HEAD
    public function getUserName()
=======
    public function getUsername(): ?string
>>>>>>> f0e45f07e191f70c7789ed7e709f90cb45db72ab
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        //Par défaut ROLE_USER :
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function getSalt()
    {
       return null;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
