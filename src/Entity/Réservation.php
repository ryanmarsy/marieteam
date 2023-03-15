<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'réservation')]
#[ORM\Index(name: 'id_traversee', columns: ['id_traversee'])]
#[ORM\Index(name: 'id_utilisateur', columns: ['id_utilisateur'])]
#[ORM\Entity]
class Réservation
{
    #[ORM\Column(name: 'id_reservation', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $idReservation;

    #[ORM\Column(name: 'montant_global', type: 'float', precision: 10, scale: 0, nullable: false)]
    private $montantGlobal;

    #[ORM\Column(name: 'id_traversee', type: 'integer', nullable: false)]
    private $idTraversee;

    #[ORM\Column(name: 'id_utilisateur', type: 'integer', nullable: false)]
    private $idUtilisateur;

    public function getIdReservation(): ?int
    {
        return $this->idReservation;
    }

    public function getMontantGlobal(): ?float
    {
        return $this->montantGlobal;
    }

    public function setMontantGlobal(float $montantGlobal): self
    {
        $this->montantGlobal = $montantGlobal;

        return $this;
    }

    public function getIdTraversee(): ?int
    {
        return $this->idTraversee;
    }

    public function setIdTraversee(int $idTraversee): self
    {
        $this->idTraversee = $idTraversee;

        return $this;
    }

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(int $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }


}
