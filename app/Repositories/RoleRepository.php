<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\BaseContract;
use Spatie\Permission\Models\Role;

final class RoleRepository extends BaseRepository implements BaseContract
{
    public function __construct(Role $model){
        parent::__construct($model);
    }

    public function findByName(string $roleName): ?object
    {
        return $this->model->findByName($roleName, 'api');
    }

    public function showRoleWithPermissions(string $roleName): ?object
    {
        return $this->model->select('id','name')->with('permissions:id,name')->where('name', $roleName)->first();
    }
}
