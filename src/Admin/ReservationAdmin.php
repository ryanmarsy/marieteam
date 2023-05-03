<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\Client;
use App\Entity\Traversee;
use App\Entity\ReservationCategorie;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollectionInterface;

final class ReservationAdmin extends AbstractAdmin
{
    protected function configureRoutes(RouteCollectionInterface $collection): void
    {
        $collection->remove('create');
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('id')
            ->add('client.nom', null, [
                'label' => 'Client',
                'associated_property' => function (Client $client) {
                    return sprintf('%s - %s', $client->getNom(), $client->getPrenom());
                },
            ]);
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('id')
            ->add('client', null, [
                'label' => 'Client',
                'associated_property' => function (Client $client) {
                    return sprintf('%s %s', $client->getNom(), $client->getPrenom());
                },
            ])
            ->add('traversee', null, [
                'label' => 'Traversee',
                'associated_property' => function (Traversee $traversee) {
                    return sprintf('%s - %s le %s à %s', $traversee->getLiaison()->getPortDepart(), $traversee->getLiaison()->getPortArrivee(), $traversee->getDateDepart()->format('d-m-Y'), $traversee->getHeureDepart()->format('H:i'));
                },
            ])
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
            ->add('id')
            ->add('client', null, [
                'label' => 'Client',
                'associated_property' => function (Client $client) {
                    return sprintf('%s %s', $client->getNom(), $client->getPrenom());
                },
            ])
            ->add('traversee', null, [
                'label' => 'Traversee',
                'associated_property' => function (Traversee $traversee) {
                    return sprintf('%s - %s le %s à %s', $traversee->getLiaison()->getPortDepart(), $traversee->getLiaison()->getPortArrivee(), $traversee->getDateDepart()->format('d-m-Y'), $traversee->getHeureDepart()->format('H:i'));
                },
            ])
            ->add('reservationCategories', null, [
                'label' => 'Reservation Categories',
                'associated_property' => function (ReservationCategorie $reservationCategorie) {
                    return sprintf('%s (%d)', $reservationCategorie->getCategorie()->getLibelleCategorie(), $reservationCategorie->getQuantite());
                },
            ]);
    }
}
