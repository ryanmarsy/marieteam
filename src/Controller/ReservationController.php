<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Entity\ReservationCategorie;
use App\Repository\CategorieRepository;
use App\Form\ReservationConfirmationType;
use App\Repository\ReservationRepository;
use App\Service\PrixService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
class ReservationController extends AbstractController
{
    public function __construct(private CategorieRepository $categorieRepository, private ReservationRepository $reservationRepository)
    {
    }

    #[Route('/reservation/new/step/1', name: 'reservation_new_step_1')]
    public function newStep1(Request $request): Response
    {
        // Créer le formulaire à partir de la classe ReservationType et de la nouvelle instance de Reservation
        $form = $this->createForm(ReservationType::class);

        // Traiter la requête soumise par l'utilisateur
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer les données
            $liaisonId = $form->get('liaison')->getData()->getId();
            $dateSouhaitee = $form->get('date')->getData();
            $categories = $this->categorieRepository->findAll();
            // Initialiser un tableau pour stocker les quantités de catégories
            $categoryData = [];

            // Boucler sur les catégories et récupérer la quantité correspondante
            foreach ($categories as $categorie) {
                $categoryId = (string)$categorie->getId();
                $categoryData[$categoryId] = $form->get($categoryId)->getData();
            }

            return $this->redirectToRoute('reservation_new_step_2', [
                'liaisonId' => $liaisonId,
                'dateSouhaitee' => $dateSouhaitee->format('Y-m-d'),
                'categoryData' => serialize($categoryData),
            ]);
        }

        // Afficher le formulaire
        return $this->render('reservation/new_step_1.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/reservation/new/step/2', name: 'reservation_new_step_2')]
    public function newStep2(Request $request): Response
    {
        $form = $this->createForm(ReservationConfirmationType::class, null, [
            'liaison_id' => $request->query->get('liaisonId'),
            'date_souhaitee' => $request->query->get('dateSouhaitee'),
            'category_data' => $request->query->get('categoryData')
        ]);

        $categories = unserialize($request->query->get('categoryData'));


        // Handle the form submission
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Get the form data
            $formData = $form->getData();

            // Create a new Reservation object
            $reservation = new Reservation();

            // Set the client
            $client = $this->getUser(); // or however you get the client
            $reservation->setClient($client);

            // Set the traversée
            $traversee = $formData['traversee'];
            $reservation->setTraversee($traversee);

            // Set the reservation categories
            foreach ($categories as $categorieId => $value) {
                $reservationCategory = new ReservationCategorie();
                $reservationCategory->setReservation($reservation);
                $reservationCategory->setCategorie($this->categorieRepository->find($categorieId));
                $reservationCategory->setQuantite($value);
                $reservation->addReservationCategory($reservationCategory);
            }

            // Persist the new reservation object
            $this->reservationRepository->save($reservation, true);

            // Redirect to the reservation confirmation page
            return $this->redirectToRoute('reservation_confirmation', [
                'id' => $reservation->getId(),
            ]);
        }

        // Display the confirmation form
        return $this->render('reservation/new_step_2.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route("/reservation/confirmation/{id}", name:"reservation_confirmation")]
    public function confirm(int $id, PrixService $prixService): Response
    {
        $reservation = $this->reservationRepository->find($id);
        
        // Display the confirmation form
        return $this->render('reservation/confirmation.html.twig', [
            'reservation' => $reservation,
            'total' => $prixService->calculerPrixTotal($reservation)
        ]);
    }
}
