<?php

/*
 * This file is part of itk-dev/user-bundle.
 *
 * (c) 2019 ITK Development
 *
 * This source file is subject to the MIT license.
 */

namespace ItkDev\UserBundle\Command;

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class RemoveRoleCommand extends RoleCommand
{
    protected static $defaultName = 'itk-dev:user:remove-role';

    protected function executeRoleCommand(OutputInterface $output, UserInterface $user, bool $super, array $roles)
    {
        $this->userManager->removeRoles($user, $super ? [$this->userManager->getSuperAdminRole()] : $roles);
        $this->userManager->updateUser($user);
    }
}
