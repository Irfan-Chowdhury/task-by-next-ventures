<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\BaseContract;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

class PermissionRepository extends BaseRepository implements BaseContract
{
    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }
}
