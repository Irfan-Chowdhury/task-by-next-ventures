<?php

declare(strict_types=1);

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface BaseContract
{
    public function all(): Collection;

    public function create(array $data): object;

    public function findById(int $id): ?object;

    public function update(int $id, array $data): ?object;

    public function delete(int $id): bool;
}
