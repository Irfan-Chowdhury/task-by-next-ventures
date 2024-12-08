<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\RoleContract;
use App\Http\Resources\RoleResource;

class RoleService
{
    public function __construct(private RoleContract $roleContract) {}

    public function getAllRoles()
    {
        return $this->roleContract->all();
    }

    public function createRole(array $data): object
    {
        $data = [
            'name' => $data['name'],
            'guard_name' => 'api',
        ];

        $role = $this->roleContract->create($data);

        return new RoleResource($role);

    }

    public function showRole(int $id): object
    {
        $role = $this->roleContract->findById($id);

        $role->load('permissions');

        return new RoleResource($role);
    }

    public function updateRole(int $id, array $data): ?object
    {
        $role = $this->roleContract->update($id, $data);

        return new RoleResource($role);

    }

    public function deleteRole(int $id)
    {
        return $this->roleContract->delete($id);
    }

    public function setPermissionsToRole(string $RoleName, array $permissionNames): ?object
    {
        $role = $this->roleContract->findByName($RoleName);

        $role->syncPermissions($permissionNames);

        return $this->roleContract->showRoleWithPermissions($RoleName);
    }
}
