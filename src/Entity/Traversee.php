<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'traversee')]
#[ORM\Entity]
class Traversee
{
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $id;

    #[ORM\Column(name: 'date_depart', type: 'datetime', nullable: false)]
    private $dateDepart;

    #[ORM\ManyToOne(inversedBy: 'lesTraversees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Liaison $liaison = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heureDepart = null;

    #[ORM\OneToMany(mappedBy: 'traversee', targetEntity: Reservation::class, orphanRemoval: true)]
    private Collection $reservations;

    #[ORM\ManyToOne(inversedBy: 'traversees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Bateau $bateau = null;

    #[ORM\OneToMany(mappedBy: 'traversee', targetEntity: Prix::class, orphanRemoval: true)]
    private Collection $prixes;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->prixes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLiaison(): ?Liaison
    {
        return $this->liaison;
    }

    public function setLiaison(?Liaison $liaison): self
    {
        $this->liaison = $liaison;

        return $this;
    }

    public function getHeureDepart(): ?\DateTimeInterface
    {
        return $this->heureDepart;
    }

    public function setHeureDepart(\DateTimeInterface $heureDepart): self
    {
        $this->heureDepart = $heureDepart;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setTraversee($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getTraversee() === $this) {
                $reservation->setTraversee(null);
            }
        }

        return $this;
    }

    public function getBateau(): ?BATEAU
    {
        return $this->bateau;
    }

    public function setBateau(?BATEAU $bateau): self
    {
        $this->bateau = $bateau;

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
            $prix->setTraversee($this);
        }

        return $this;
    }

    public function removePrix(Prix $prix): self
    {
        if ($this->prixes->removeElement($prix)) {
            // set the owning side to null (unless already changed)
            if ($prix->getTraversee() === $this) {
                $prix->setTraversee(null);
            }
        }

        return $this;
    }
}
