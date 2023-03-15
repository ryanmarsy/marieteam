<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'equipement')]
#[ORM\UniqueConstraint(name: 'libelle_equipement', columns: ['libelle_equipement'])]
#[ORM\Entity]
class Equipement
{
    #[ORM\Column(name: 'id_equipement', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $idEquipement;

    #[ORM\Column(name: 'libelle_equipement', type: 'string', length: 50, nullable: false)]
    private $libelleEquipement;

    public function getIdEquipement(): ?int
    {
        return $this->idEquipement;
    }

    public function getLibelleEquipement(): ?string
    {
        return $this->libelleEquipement;
    }

    public function setLibelleEquipement(string $libelleEquipement): self
    {
        $this->libelleEquipement = $libelleEquipement;

        return $this;
    }


}
