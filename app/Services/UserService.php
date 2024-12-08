<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\UserContract;
use App\Http\Resources\UserResource;
use Illuminate\Support\Str;

final class UserService
{
    public function __construct(public UserContract $userContract) {}

    public function getAllUsers()
    {
        $users = $this->userContract->all();

        return $users;
    }

    public function createUser(array $data): object
    {
        $newData = array_merge($data, [
            'username' => strtolower(str_replace(' ', '', $data['name'])).'_'.Str::random(6),
            'password' => bcrypt($data['password']),
            'is_active' => true,
        ]);

        $user = $this->userContract->create($newData);

        $user->assignRole($data['role_names']);

        return $user;
    }

    public function showUser(int $id): object
    {
        $user = $this->userContract->findById($id);

        $user->load('roles.permissions');

        return new UserResource($user);
    }

    public function updateUser(int $id, array $data): ?object
    {
        if (isset($data['password'])) {
            $data = array_merge($data, [
                'password' => bcrypt($data['password']),
            ]);
        }

        $user = $this->userContract->update($id, $data);

        $user->syncRoles($data['role_names']);

        $user->load('roles.permissions');

        return new UserResource($user);
    }

    public function deleteUser(int $id)
    {
        return $this->userContract->delete($id);
    }
}
