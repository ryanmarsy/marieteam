<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Reservation;
use App\Repository\PrixRepository;

class PrixService
{
    public function __construct(private PrixRepository $prixRepository)
    {
    }

    public function calculerPrixTotal(Reservation $reservation)
    {
        // Récupérer la traversée sélectionnée
        $traversee = $reservation->getTraversee();

        // Récupérer les tarifs pour la traversée sélectionnée
        $prix = $this->prixRepository->findBy(['traversee' => $traversee]);

        // Initialiser le prix total à 0
        $prixTotal = 0;

        // Boucler sur les catégories de la réservation et récupérer la quantité sélectionnée
        foreach ($reservation->getReservationCategories() as $reservationCategorie) {
            $quantite = $reservationCategorie->getQuantite();

            // Trouver le tarif correspondant à la catégorie et à la traversée
            $tarif = null;
            foreach ($prix as $p) {
                if ($p->getCategorie() === $reservationCategorie->getCategorie()) {
                    $tarif = $p->getPrix();
                    break;
                }
            }

            // Ajouter le montant de la catégorie au prix total
            $prixTotal += $quantite * $tarif;
        }

        return $prixTotal;
    }
}
