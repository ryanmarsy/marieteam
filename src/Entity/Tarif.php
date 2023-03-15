<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'tarif')]
#[ORM\Index(name: 'id_periode', columns: ['id_periode'])]
#[ORM\Index(name: 'id_liaison', columns: ['id_liaison'])]
#[ORM\Index(name: 'id_type', columns: ['id_type'])]
#[ORM\Entity]
class Tarif
{
    #[ORM\Column(name: 'id_tarif', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $idTarif;

    #[ORM\Column(name: 'prix', type: 'float', precision: 10, scale: 0, nullable: false)]
    private $prix;

    #[ORM\Column(name: 'id_liaison', type: 'integer', nullable: false)]
    private $idLiaison;

    #[ORM\Column(name: 'id_periode', type: 'integer', nullable: false)]
    private $idPeriode;

    #[ORM\Column(name: 'id_type', type: 'integer', nullable: false)]
    private $idType;

    public function getIdTarif(): ?int
    {
        return $this->idTarif;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getIdLiaison(): ?int
    {
        return $this->idLiaison;
    }

    public function setIdLiaison(int $idLiaison): self
    {
        $this->idLiaison = $idLiaison;

        return $this;
    }

    public function getIdPeriode(): ?int
    {
        return $this->idPeriode;
    }

    public function setIdPeriode(int $idPeriode): self
    {
        $this->idPeriode = $idPeriode;

        return $this;
    }

    public function getIdType(): ?int
    {
        return $this->idType;
    }

    public function setIdType(int $idType): self
    {
        $this->idType = $idType;

        return $this;
    }


}
