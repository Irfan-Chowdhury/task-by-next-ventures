<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\UserContract;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

final class UserRepository extends BaseRepository implements UserContract
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return $this->model
            ->select('id', 'name', 'username', 'email', 'phone', 'address', 'is_active')
            ->get();
    }
}
