<?php
namespace App\Form;

use DateTimeImmutable;
use App\Entity\Traversee;
use App\Repository\TraverseeRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ReservationConfirmationType extends AbstractType
{
    public function __construct(private TraverseeRepository $traverseeRepository, private array $options = [])
    {
        $this->traverseeRepository = $traverseeRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->options['liaison_id'] = $options['liaison_id'];
        $this->options['date_souhaitee'] = $options['date_souhaitee'];
        $this->options['category_data'] = unserialize($options['category_data']);
        
        $builder
            ->add('traversee', ChoiceType::class, [
                'choices' => $this->getTraversees(),
                'choice_label' => function (Traversee $traversee) {
                    return sprintf(
                        '%s - %s - %s places disponibles',
                        $traversee->getDateDepart()->format('d/m/Y'),
                        (string)$traversee->getHeureDepart()->format('H:i'),
                        $this->getPlacesDisponibles($traversee)
                    );
                }
            ])
            ->add('submit', SubmitType::class);
    }

    private function getTraversees(): array
    {
        $traversees = $this->traverseeRepository->findByLiaisonAndDateDepart(
            new DateTimeImmutable($this->options['date_souhaitee']),
            $this->options['liaison_id']
        );

        $traverseesDisponibles = [];
        foreach ($traversees as $traversee) {
            if ($this->traverseeHasEnoughPlaces($traversee)) {
                $traverseesDisponibles[$traversee->getId()] = $traversee;
            }
        }

        return $traverseesDisponibles;
    }

    private function getPlacesDisponibles(Traversee $traversee): int
    {
        $placesDisponibles = $traversee->getBateau()->getCapacitemaximum();

        foreach ($traversee->getReservations() as $reservation) {
            foreach ($reservation->getReservationCategories() as $reservationCategorie) {
                $categoryId = $reservationCategorie->getCategorie()->getId();
                if (isset($this->options['category_data'][$categoryId])) {
                    $placesDisponibles -= $reservationCategorie->getQuantite();
                }
            }
        }

        return $placesDisponibles;
    }

    private function traverseeHasEnoughPlaces(Traversee $traversee): bool
    {
        $placesDisponibles = $this->getPlacesDisponibles($traversee);
        foreach ($this->options['category_data'] as $categoryId => $quantity) {
            if ($quantity > $placesDisponibles) {
                return false;
            }
        }

        return true;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'liaison_id' => null,
            'date_souhaitee' => null,
            'category_data' => null
        ]);
    }
}
