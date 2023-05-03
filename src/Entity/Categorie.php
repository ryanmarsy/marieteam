<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'categorie')]
#[ORM\UniqueConstraint(name: 'libelle_categorie', columns: ['libelle_categorie'])]
#[ORM\Entity]
class Categorie
{
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $id;

    #[ORM\Column(name: 'libelle_categorie', type: 'string', length: 50, nullable: false)]
    private $libelleCategorie;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Prix::class, orphanRemoval: true)]
    private Collection $prixes;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: ReservationCategorie::class, orphanRemoval: true)]
    private Collection $reservationCategories;

    public function __construct()
    {
        $this->prixes = new ArrayCollection();
        $this->reservationCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleCategorie(): ?string
    {
        return $this->libelleCategorie;
    }

    public function setLibelleCategorie(string $libelleCategorie): self
    {
        $this->libelleCategorie = $libelleCategorie;

        return $this;
    }

    /**
     * @return Collection<int, Prix>
     */
    public function getPrixes(): Collection
    {
        return $this->prixes;
    }

    public function addPrix(Prix $prix): self
    {
        if (!$this->prixes->contains($prix)) {
            $this->prixes->add($prix);
            $prix->setCategorie($this);
        }

        return $this;
    }

    public function removePrix(Prix $prix): self
    {
        if ($this->prixes->removeElement($prix)) {
            // set the owning side to null (unless already changed)
            if ($prix->getCategorie() === $this) {
                $prix->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ReservationCategorie>
     */
    public function getReservationCategories(): Collection
    {
        return $this->reservationCategories;
    }

    public function addReservationCategory(ReservationCategorie $reservationCategory): self
    {
        if (!$this->reservationCategories->contains($reservationCategory)) {
            $this->reservationCategories->add($reservationCategory);
            $reservationCategory->setCategorie($this);
        }

        return $this;
    }

    public function removeReservationCategory(ReservationCategorie $reservationCategory): self
    {
        if ($this->reservationCategories->removeElement($reservationCategory)) {
            // set the owning side to null (unless already changed)
            if ($reservationCategory->getCategorie() === $this) {
                $reservationCategory->setCategorie(null);
            }
        }

        return $this;
    }
}
