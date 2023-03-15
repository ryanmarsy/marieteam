<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'liaison')]
#[ORM\Index(name: 'id_secteur', columns: ['id_secteur'])]
#[ORM\Entity]
class Liaison
{
    #[ORM\Column(name: 'id_liaison', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $idLiaison;

    #[ORM\Column(name: 'distance', type: 'float', precision: 10, scale: 0, nullable: false)]
    private $distance;

    #[ORM\Column(name: 'port_depart', type: 'string', length: 50, nullable: false)]
    private $portDepart;

    #[ORM\Column(name: 'port_arrivee', type: 'string', length: 50, nullable: false)]
    private $portArrivee;

    #[ORM\Column(name: 'id_secteur', type: 'integer', nullable: false)]
    private $idSecteur;

    public function getIdLiaison(): ?int
    {
        return $this->idLiaison;
    }

    public function getDistance(): ?float
    {
        return $this->distance;
    }

    public function setDistance(float $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getPortDepart(): ?string
    {
        return $this->portDepart;
    }

    public function setPortDepart(string $portDepart): self
    {
        $this->portDepart = $portDepart;

        return $this;
    }

    public function getPortArrivee(): ?string
    {
        return $this->portArrivee;
    }

    public function setPortArrivee(string $portArrivee): self
    {
        $this->portArrivee = $portArrivee;

        return $this;
    }

    public function getIdSecteur(): ?int
    {
        return $this->idSecteur;
    }

    public function setIdSecteur(int $idSecteur): self
    {
        $this->idSecteur = $idSecteur;

        return $this;
    }


}
