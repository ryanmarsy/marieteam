<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\Bateau;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

final class EquipementAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('id')
            ->add('libelleEquipement')
            ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('id')
            ->add('libelleEquipement')
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
            ->add('libelleEquipement')
            ->add('bateau', EntityType::class, [
                'class' => Bateau::class,
                'choice_label' => 'libelleBateau', // affiche le nom du bateau dans la liste déroulante
                'multiple' => true, // permet de sélectionner plusieurs bateaux
                'expanded' => true, // affiche la liste sous forme de cases à cocher plutôt que de liste déroulante
            ]);
            ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('id')
            ->add('libelleEquipement')
            ->add('bateau', null, [
                'label' => 'Reservation Categories',
                'associated_property' => function (Bateau $bateau) {
                    return sprintf('%s', $bateau->getLibelleBateau());
                },
            ]);
            ;
    }
}
