<?php

declare(strict_types=1);

namespace App\Manager;

use App\Repository\AdminRepository;
use Sonata\AdminBundle\Util\AdminAclUserManagerInterface;

final class AclUserManager implements AdminAclUserManagerInterface
{
    public function __construct(private AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function findUsers(): iterable
    {
        return $this->adminRepository->findAll();
    }
}
