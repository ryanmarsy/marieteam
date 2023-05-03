<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'liaison')]
#[ORM\Entity]
class Liaison
{
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $id;

    #[ORM\Column(name: 'distance', type: 'float', precision: 10, scale: 0, nullable: false)]
    private $distance;

    #[ORM\Column(name: 'port_depart', type: 'string', length: 50, nullable: false)]
    private $portDepart;

    #[ORM\Column(name: 'port_arrivee', type: 'string', length: 50, nullable: false)]
    private $portArrivee;

    #[ORM\OneToMany(mappedBy: 'liaison', targetEntity: Traversee::class, orphanRemoval: true)]
    private Collection $lesTraversees;

    #[ORM\ManyToOne(inversedBy: 'liaisons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pays $pays = null;

    public function __construct()
    {
        $this->lesTraversees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Traversee>
     */
    public function getLesTraversees(): Collection
    {
        return $this->lesTraversees;
    }

    public function addLesTraversee(Traversee $lesTraversee): self
    {
        if (!$this->lesTraversees->contains($lesTraversee)) {
            $this->lesTraversees->add($lesTraversee);
            $lesTraversee->setLiaison($this);
        }

        return $this;
    }

    public function removeLesTraversee(Traversee $lesTraversee): self
    {
        if ($this->lesTraversees->removeElement($lesTraversee)) {
            // set the owning side to null (unless already changed)
            if ($lesTraversee->getLiaison() === $this) {
                $lesTraversee->setLiaison(null);
            }
        }

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }
}
