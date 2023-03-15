<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'equipe')]
#[ORM\Index(name: 'id_equipement', columns: ['id_equipement'])]
#[ORM\Entity]
class Equipe
{
    #[ORM\Column(name: 'id_bateau', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private $idBateau;

    #[ORM\Column(name: 'id_equipement', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private $idEquipement;

    public function getIdBateau(): ?int
    {
        return $this->idBateau;
    }

    public function getIdEquipement(): ?int
    {
        return $this->idEquipement;
    }


}
