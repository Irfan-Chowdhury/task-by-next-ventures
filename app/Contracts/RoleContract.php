<?php

declare(strict_types=1);

namespace App\Contracts;


interface RoleContract extends BaseContract
{
    public function findByName(string $roleName): ?object;

    public function showRoleWithPermissions(string $roleName): ?object;
}
