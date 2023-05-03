<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'bateau')]
#[ORM\UniqueConstraint(name: 'libelle_bateau', columns: ['libelle_bateau'])]
#[ORM\Entity]
class Bateau
{
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $id;

    #[ORM\Column(name: 'libelle_bateau', type: 'string', length: 50, nullable: false)]
    private $libelleBateau;

    #[ORM\Column(name: 'longueur', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $longueur;

    #[ORM\Column(name: 'largeur', type: 'float', precision: 10, scale: 0, nullable: true)]
    private $largeur;

    #[ORM\Column(name: 'vitesse', type: 'integer', nullable: true)]
    private $vitesse;

    #[ORM\Column(name: 'capaciteMaximum', type: 'integer', nullable: false)]
    private $capacitemaximum;

    #[ORM\OneToMany(mappedBy: 'bateau', targetEntity: Traversee::class, orphanRemoval: true)]
    private Collection $traversees;

    #[ORM\ManyToMany(targetEntity: Equipement::class, mappedBy: 'bateau')]
    private Collection $equipements;

    public function __construct()
    {
        $this->traversees = new ArrayCollection();
        $this->equipements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleBateau(): ?string
    {
        return $this->libelleBateau;
    }

    public function setLibelleBateau(string $libelleBateau): self
    {
        $this->libelleBateau = $libelleBateau;

        return $this;
    }

    public function getLongueur(): ?float
    {
        return $this->longueur;
    }

    public function setLongueur(?float $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?float
    {
        return $this->largeur;
    }

    public function setLargeur(?float $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getVitesse(): ?int
    {
        return $this->vitesse;
    }

    public function setVitesse(?int $vitesse): self
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    public function getCapacitemaximum(): ?int
    {
        return $this->capacitemaximum;
    }

    public function setCapacitemaximum(int $capacitemaximum): self
    {
        $this->capacitemaximum = $capacitemaximum;

        return $this;
    }

    /**
     * @return Collection<int, Traversee>
     */
    public function getTraversees(): Collection
    {
        return $this->traversees;
    }

    public function addTraversee(Traversee $traversee): self
    {
        if (!$this->traversees->contains($traversee)) {
            $this->traversees->add($traversee);
            $traversee->setBateau($this);
        }

        return $this;
    }

    public function removeTraversee(Traversee $traversee): self
    {
        if ($this->traversees->removeElement($traversee)) {
            // set the owning side to null (unless already changed)
            if ($traversee->getBateau() === $this) {
                $traversee->setBateau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Equipement>
     */
    public function getEquipements(): Collection
    {
        return $this->equipements;
    }

    public function addEquipement(Equipement $equipement): self
    {
        if (!$this->equipements->contains($equipement)) {
            $this->equipements->add($equipement);
            $equipement->addBateau($this);
        }

        return $this;
    }

    public function removeEquipement(Equipement $equipement): self
    {
        if ($this->equipements->removeElement($equipement)) {
            $equipement->removeBateau($this);
        }

        return $this;
    }
}
