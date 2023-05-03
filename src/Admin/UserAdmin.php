<?php

namespace App\Admin;

use Knp\Menu\ItemInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\UserBundle\Admin\Model\UserAdmin as BaseUserAdmin;

class UserAdmin extends BaseUserAdmin
{
    protected function configureTabMenu(ItemInterface $menu, string $action, ?AdminInterface $childAdmin = null): void
    {
        $menu->addChild('comments', ['attributes' => ['dropdown' => true]]);
    }

    protected function configureListFields(ListMapper $list): void
    {
        $this->setLabel('Administrateurs');
    }
}
