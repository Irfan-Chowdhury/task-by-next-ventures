<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Str;

final Class UserService
{

    public function __construct(public UserRepository $userRepository, private RoleRepository $roleRepository){}

    public function getAllUsers()
    {
        $users = $this->userRepository->all();

        return UserResource::collection($users);
    }

    public function createUser(array $data): object
    {
        $newData = array_merge($data, [
            'username'=> strtolower(str_replace(' ', '', $data['name'])).'_'.Str::random(6),
            'password'=> bcrypt($data['password']),
            'is_active'=> true,
        ]);

        $user = $this->userRepository->create($newData);

        $user->assignRole($data['role_names']);

        return $user;
    }

    public function showUser(int $id): object
    {
        $user =  $this->userRepository->findById($id);

        $user->load('roles.permissions');

        return new UserResource($user);
    }

    public function updateUser(int $id, array $data): object|null
    {
        if (isset($data['password'])) {
            $data = array_merge($data, [
                'password'=> bcrypt($data['password']),
            ]);
        }

        $user = $this->userRepository->update($id, $data);

        $user->syncRoles($data['role_names']);

        $user->load('roles.permissions');

        return new UserResource($user);
    }

    public function deleteUser(int $id)
    {
        return $this->userRepository->delete($id);
    }
}
