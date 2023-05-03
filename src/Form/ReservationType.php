<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\Liaison;
use App\Repository\CategorieRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ReservationType extends AbstractType
{
    public function __construct(private CategorieRepository $categorieRepository)
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('liaison', EntityType::class, [
                'mapped' => false,
                'class' => Liaison::class,
                'choice_label' => function (Liaison $liaison) {
                    return sprintf('%s - %s', $liaison->getPortDepart(), $liaison->getPortArrivee());
                },
                'placeholder' => 'Sélectionnez une traversée',
                'label' => 'Traversée',
            ])
            ->add('date', DateType::class, [
                'mapped' => false,
                'widget' => 'single_text',
                'label' => 'Date souhaitée',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Rechercher les disponibilités',
            ]);

        foreach ($this->categorieRepository->findAll() as $categorie) {
            $builder->add((string)$categorie->getId(), IntegerType::class, [
                'mapped' => false,
                'label' => $categorie->getLibelleCategorie(),
                'data' => 0,
                'required' => false,
            ]);
        }
    }
}
