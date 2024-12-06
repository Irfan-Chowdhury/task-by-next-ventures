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

    public function createPermission(array $data): object
    {
        $data = [
            'name' => $data['name'],
            'guard_name' => 'api',
        ];

        return $this->permissionRepository->create($data);
    }

    public function showPermission(int $id): object
    {
        return $this->permissionRepository->findById($id);
    }

    public function updatePermission(int $id, array $data): object|null
    {
        return $this->permissionRepository->update($id, $data);
    }

    public function deletePermission(int $id)
    {
        return $this->permissionRepository->delete($id);
    }

}
