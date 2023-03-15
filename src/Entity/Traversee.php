<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'traversee')]
#[ORM\Index(name: 'id_bateau', columns: ['id_bateau'])]
#[ORM\Index(name: 'id_liaison', columns: ['id_liaison'])]
#[ORM\Entity]
class Traversee
{
    #[ORM\Column(name: 'id_traversee', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $idTraversee;

    #[ORM\Column(name: 'date_depart', type: 'datetime', nullable: false)]
    private $dateDepart;

    #[ORM\Column(name: 'id_liaison', type: 'integer', nullable: false)]
    private $idLiaison;

    #[ORM\Column(name: 'id_bateau', type: 'integer', nullable: false)]
    private $idBateau;

    public function getIdTraversee(): ?int
    {
        return $this->idTraversee;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->dateDepart;
    }

    public function setDateDepart(\DateTimeInterface $dateDepart): self
    {
        $this->dateDepart = $dateDepart;

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

    public function getIdBateau(): ?int
    {
        return $this->idBateau;
    }

    public function setIdBateau(int $idBateau): self
    {
        $this->idBateau = $idBateau;

        return $this;
    }


}
