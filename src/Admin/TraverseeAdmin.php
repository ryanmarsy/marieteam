<?php

declare(strict_types=1);

namespace App\Admin;

use DateTime;
use App\Entity\Bateau;
use App\Entity\Liaison;
use App\Entity\Traversee;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

final class TraverseeAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('id')
            ->add('dateDepart')
            ->add('heureDepart');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->addIdentifier('id')
            ->add('liaison', null, [
                'label' => 'Liaison',
                'associated_property' => function (Liaison $liaison) {
                    return sprintf('%s - %s', $liaison->getPortDepart(), $liaison->getPortArrivee());
                },
            ])
            ->add('bateau', null, [
                'label' => 'Bateau',
                'associated_property' => function (Bateau $bateau) {
                    return sprintf('%s', $bateau->getLibelleBateau());
                },
            ])
            ->add('dateDepart')
            ->add('heureDepart')
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('liaison', EntityType::class, [
                'class' => Liaison::class,
                'choice_label' => function (Liaison $liaison) {
                    return sprintf('%s - %s', $liaison->getPortDepart(), $liaison->getPortArrivee());
                },
            ])
            ->add('bateau', EntityType::class, [
                'class' => Bateau::class,
                'choice_label' => 'libelleBateau',
            ])
            ->add('dateDepart', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('heureDepart');
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('id')
            ->add('liaison', null, [
                'label' => 'Liaison',
                'associated_property' => function (Liaison $liaison) {
                    return sprintf('%s - %s', $liaison->getPortDepart(), $liaison->getPortArrivee());
                },
            ])
            ->add('bateau', null, [
                'label' => 'Bateau',
                'associated_property' => function (Bateau $bateau) {
                    return sprintf('%s', $bateau->getLibelleBateau());
                },
            ])
            ->add('dateDepart', 'datetime', [
                'format' => 'd-m-Y',
            ])
            ->add('heureDepart');
    }
}
