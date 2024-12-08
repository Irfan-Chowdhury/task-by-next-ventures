<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\PermissionContract;
use App\Http\Resources\PermissionResource;

class PermissionService
{
    public function __construct(private PermissionContract $permissionContract) {}

    public function getAllPermissions()
    {
        $permissions = $this->permissionContract->all();

        return PermissionResource::collection($permissions);
    }
}
