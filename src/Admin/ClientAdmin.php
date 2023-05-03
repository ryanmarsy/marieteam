<?php

declare(strict_types=1);

namespace App\Admin;

use Knp\Menu\ItemInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class ClientAdmin extends AbstractAdmin
{
    public function __construct(private TranslatorInterface $translator, private UserPasswordHasherInterface $userPasswordHasherInterface)
    {
    }
    
    protected function configureTabMenu(ItemInterface $menu, $action, ?AdminInterface $childAdmin = null): void
    {
        $menu->addChild('home', [
            'route' => 'sonata_admin_dashboard',
            'label' => $this->translator->trans('admin.dashboard'),
            'attributes' => [
                'icon' => 'fa fa-home',
            ],
        ]);
        $menu->addChild('client_list', [
            'route' => 'admin_app_client_list',
            'label' => $this->translator->trans('admin.groups.clients'),
            'attributes' => [
                'icon' => 'fa fa-users',
            ],
        ]);
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('id')
            ->add('email')
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('ville')
            ->add('codePostal')
            ->add('password')
            ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('id')
            ->add('email')
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('ville')
            ->add('codePostal')
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
        
            $this->setLabel('Clients');
    }

    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('email')
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('ville')
            ->add('codePostal')
            ->add('password', PasswordType::class)
            ;
    }

    protected function preUpdate(object $client): void
    {
        if ($password = $client->getPassword()) {;
            $client->setPassword($this->userPasswordHasherInterface->hashPassword($client, $password));
        }
    }

    protected function prePersist(object $client): void
    {
        if ($password = $client->getPassword()) {;
            $client->setPassword($this->userPasswordHasherInterface->hashPassword($client, $password));
        }
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('id')
            ->add('email')
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('ville')
            ->add('codePostal')
            ->add('password')
            ;
    }
}
