<?php

namespace App\Entity;

use App\Repository\ReservationCategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'reservation')]
#[ORM\Entity]
class Reservation
{
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $id;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Traversee $traversee = null;

    #[ORM\OneToMany(mappedBy: 'reservation', targetEntity: ReservationCategorie::class, orphanRemoval: true, cascade: ["persist"])]
    private Collection $reservationCategories;

    public function __construct()
    {
        $this->reservationCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getTraversee(): ?Traversee
    {
        return $this->traversee;
    }

    public function setTraversee(?Traversee $traversee): self
    {
        $this->traversee = $traversee;

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
            $reservationCategory->setReservation($this);
        }

        return $this;
    }

    public function removeReservationCategory(ReservationCategorie $reservationCategory): self
    {
        if ($this->reservationCategories->removeElement($reservationCategory)) {
            // set the owning side to null (unless already changed)
            if ($reservationCategory->getReservation() === $this) {
                $reservationCategory->setReservation(null);
            }
        }

        return $this;
    }
}
