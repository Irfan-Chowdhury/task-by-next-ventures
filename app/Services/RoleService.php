<?php

declare(strict_types=1);

namespace App\Services;

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

        return $this->roleRepository->create($data);
    }

    public function showRole(int $id): object
    {
        return $this->roleRepository->findById($id);
    }

    public function updateRole(int $id, array $data): object|null
    {
        return $this->roleRepository->update($id, $data);
    }

    public function deleteRole(int $id)
    {
        return $this->roleRepository->delete($id);
    }

}
