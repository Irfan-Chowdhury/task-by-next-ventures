<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\PermissionContract;
use Spatie\Permission\Models\Permission;

class PermissionRepository extends BaseRepository implements PermissionContract
{
    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }
}
