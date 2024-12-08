<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\PermissionRepository;

class PermissionService
{
    public function __construct(private PermissionRepository $permissionRepository){}

    public function getAllPermissions()
    {
        $permissions = $this->permissionRepository->all();

        return $permissions;
    }
}
