<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\Equipement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

final class BateauAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('id')
            ->add('libelleBateau')
            ->add('longueur')
            ->add('largeur')
            ->add('vitesse')
            ->add('capacitemaximum')
            ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('id')
            ->add('libelleBateau')
            ->add('longueur')
            ->add('largeur')
            ->add('vitesse')
            ->add('capacitemaximum')
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
            ->add('libelleBateau')
            ->add('longueur')
            ->add('largeur')
            ->add('vitesse')
            ->add('capacitemaximum')
            ->add('equipements', EntityType::class, [
                'class' => Equipement::class,
                'choice_label' => 'libelleEquipement', // affiche le nom du bateau dans la liste déroulante
                'multiple' => true, // permet de sélectionner plusieurs bateaux
                'expanded' => true, // affiche la liste sous forme de cases à cocher plutôt que de liste déroulante
            ]);
            ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('id')
            ->add('libelleBateau')
            ->add('longueur')
            ->add('largeur')
            ->add('vitesse')
            ->add('capacitemaximum')
            ;
    }
}
