<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'bateau')]
#[ORM\UniqueConstraint(name: 'libelle_bateau', columns: ['libelle_bateau'])]
#[ORM\Entity]
class Bateau
{
    #[ORM\Column(name: 'id_bateau', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $idBateau;

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

    public function getIdBateau(): ?int
    {
        return $this->idBateau;
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


}
