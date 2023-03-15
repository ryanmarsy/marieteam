<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'type')]
#[ORM\Index(name: 'id_categorie', columns: ['id_categorie'])]
#[ORM\UniqueConstraint(name: 'libelle_type', columns: ['libelle_type'])]
#[ORM\Entity]
class Type
{
    #[ORM\Column(name: 'id_type', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $idType;

    #[ORM\Column(name: 'libelle_type', type: 'string', length: 50, nullable: false)]
    private $libelleType;

    #[ORM\Column(name: 'id_categorie', type: 'integer', nullable: false)]
    private $idCategorie;

    public function getIdType(): ?int
    {
        return $this->idType;
    }

    public function getLibelleType(): ?string
    {
        return $this->libelleType;
    }

    public function setLibelleType(string $libelleType): self
    {
        $this->libelleType = $libelleType;

        return $this;
    }

    public function getIdCategorie(): ?int
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(int $idCategorie): self
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }


}
