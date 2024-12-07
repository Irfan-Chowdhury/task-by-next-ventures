<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\BaseContract;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

final Class UserRepository extends BaseRepository implements BaseContract
{
    public function __construct(User $model){
        parent::__construct($model);
    }

    public function all():Collection
    {
        return $this->model
                    ->select('id','name','username','email','phone','address','is_active')
                    ->get();
    }
}
