<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Resources\RoleResource;
use App\Repositories\RoleRepository;

class RoleService
{
    public function __construct(private RoleRepository $roleRepository){}

    public function getAllRoles()
    {
        $roles = $this->roleRepository->all();

        return $roles;
    }

    public function createRole(array $data): object
    {
        $data = [
            'name' => $data['name'],
            'guard_name' => 'api',
        ];

        $role = $this->roleRepository->create($data);

        return new RoleResource($role);

    }

    public function showRole(int $id): object
    {
        $role = $this->roleRepository->findById($id);

        $role->load('permissions');

        return new RoleResource($role);
    }

    public function updateRole(int $id, array $data): object|null
    {
        $role = $this->roleRepository->update($id, $data);

        return new RoleResource($role);

    }

    public function deleteRole(int $id)
    {
        return $this->roleRepository->delete($id);
    }

    public function setPermissionsToRole(string $RoleName, array $permissionNames): ?object
    {
        $role = $this->roleRepository->findByName($RoleName);

        $role->syncPermissions($permissionNames);

        return $this->roleRepository->showRoleWithPermissions($RoleName);
    }

}
