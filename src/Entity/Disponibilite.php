<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'disponibilite')]
#[ORM\Entity]
class Disponibilite
{
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $id;

    #[ORM\Column(name: 'placesDispo', type: 'integer', nullable: false)]
    private $placesdispo;

    #[ORM\Column(name: 'id_traversee', type: 'integer', nullable: false)]
    private $idTraversee;

    #[ORM\Column(name: 'id_categorie', type: 'integer', nullable: false)]
    private $idCategorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlacesdispo(): ?int
    {
        return $this->placesdispo;
    }

    public function setPlacesdispo(int $placesdispo): self
    {
        $this->placesdispo = $placesdispo;

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
