<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseContract
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->select('id', 'name')->get();
    }

    public function create(array $data): object
    {
        return $this->model->create($data);
    }

    public function findById(int $id): ?object
    {
        return $this->model->findOrFail($id);
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
