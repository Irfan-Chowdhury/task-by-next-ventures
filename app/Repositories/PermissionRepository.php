<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\BaseContract;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

class PermissionRepository implements BaseContract
{
    protected $model;

    public function __construct(Permission $model)
    {
        $this->model = $model;
    }
    public function all(): Collection
    {
        return $this->model->select('id','name')->get();
    }

    public function create(array $data): object
    {
        return $this->model->create($data);
    }

    public function findById(int $id): ?object
    {
        return $this->model->find($id);
    }

    public function update(int $id, array $data): ?object
    {
        $permission = $this->findById($id);

        $permission->update($data);

        return $permission;
    }


    public function delete(int $id): bool
    {
        $permission = $this->findById($id);

        if ($permission) {
            return $permission->delete();
        }

        return false;
    }
}
