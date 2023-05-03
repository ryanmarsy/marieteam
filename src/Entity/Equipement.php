<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'equipement')]
#[ORM\UniqueConstraint(name: 'libelle_equipement', columns: ['libelle_equipement'])]
#[ORM\Entity]
class Equipement
{
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $id;

    #[ORM\Column(name: 'libelle_equipement', type: 'string', length: 50, nullable: false)]
    private $libelleEquipement;

    #[ORM\ManyToMany(targetEntity: Bateau::class, inversedBy: 'equipements')]
    private Collection $bateau;

    public function __construct()
    {
        $this->bateau = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Bateau>
     */
    public function getBateau(): Collection
    {
        return $this->bateau;
    }

    public function addBateau(Bateau $bateau): self
    {
        if (!$this->bateau->contains($bateau)) {
            $this->bateau->add($bateau);
        }

        return $this;
    }

    public function removeBateau(Bateau $bateau): self
    {
        $this->bateau->removeElement($bateau);

        return $this;
    }


}
