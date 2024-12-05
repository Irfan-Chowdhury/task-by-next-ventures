<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\BaseContract;
use App\Models\User;

final Class UserRepository implements BaseContract
{
    public function getAll()
    {
        return User::query()
                ->select('id','name','username','email','phone','address','is_active')
                ->get();
    }
}
