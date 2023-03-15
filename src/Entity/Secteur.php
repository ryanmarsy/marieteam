<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'secteur')]
#[ORM\UniqueConstraint(name: 'libelle_secteur', columns: ['libelle_secteur'])]
#[ORM\Entity]
class Secteur
{
    #[ORM\Column(name: 'id_secteur', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $idSecteur;

    #[ORM\Column(name: 'libelle_secteur', type: 'string', length: 50, nullable: false)]
    private $libelleSecteur;

    public function getIdSecteur(): ?int
    {
        return $this->idSecteur;
    }

    public function getLibelleSecteur(): ?string
    {
        return $this->libelleSecteur;
    }

    public function setLibelleSecteur(string $libelleSecteur): self
    {
        $this->libelleSecteur = $libelleSecteur;

        return $this;
    }


}
