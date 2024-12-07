<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\BaseContract;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

final Class UserRepository implements BaseContract
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function all():Collection
    {
        return $this->model
                    ->select('id','name','username','email','phone','address','is_active')
                    ->get();
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
        $item = $this->findById($id);

        $item->update($data);

        return $item;
    }


    public function delete(int $id): bool
    {
        $item = $this->findById($id);

        if ($item) {
            return $item->delete();
        }

        return false;
    }
}
