<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\Categorie;
use App\Entity\Reservation;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollectionInterface;

final class ReservationCategorieAdmin extends AbstractAdmin
{
    protected function configureRoutes(RouteCollectionInterface $collection): void
    {
        $collection->remove('create');
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('quantite');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('reservation', null, [
                'label' => 'ID Réservation',
                'associated_property' => function (Reservation $reservation) {
                    return sprintf('%s', $reservation->getId());
                },
            ])
            ->add('categorie', null, [
                'label' => 'Catégorie',
                'associated_property' => function (Categorie $categorie) {
                    return sprintf('%s', $categorie->getLibelleCategorie());
                },
            ])
            ->add('quantite')
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('reservation', null, [
                'label' => 'ID Réservation',
                'associated_property' => function (Reservation $reservation) {
                    return sprintf('%s', $reservation->getId());
                },
            ])
            ->add('categorie', null, [
                'label' => 'Catégorie',
                'associated_property' => function (Categorie $categorie) {
                    return sprintf('%s', $categorie->getLibelleCategorie());
                },
            ])
            ->add('quantite');
    }
}
