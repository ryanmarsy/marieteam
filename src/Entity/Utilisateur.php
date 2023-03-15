<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Utilisateur
 *
 */
#[ORM\Table(name: 'utilisateur')]
#[ORM\UniqueConstraint(name: 'email', columns: ['email'])]
#[ORM\Entity]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Column(name: 'id_utilisateur', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $idUtilisateur;

    #[ORM\Column(name: 'email', type: 'string', length: 50, nullable: false)]
    private $email;

    #[ORM\Column(name: 'nom', type: 'string', length: 50, nullable: false)]
    private $nom;

    #[ORM\Column(name: 'prenom', type: 'string', length: 50, nullable: false)]
    private $prenom;

    #[ORM\Column(name: 'adresse', type: 'string', length: 50, nullable: false)]
    private $adresse;

    #[ORM\Column(name: 'ville', type: 'string', length: 50, nullable: true)]
    private $ville;

    #[ORM\Column(name: 'code_postal', type: 'string', length: 5, nullable: false)]
    private $codePostal;

    #[ORM\Column(name: 'password', type: 'string', length: 250, nullable: false)]
    private $password;

    private array $roles = [];

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getPassword(): ?string
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
        // garantir au moins le rôle ROLE_USER aux utilisateurs
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
	
	public function eraseCredentials() {
      	}
	
	public function getUserIdentifier(): string 
          {
              return (string)$this->email;
      	}
}
