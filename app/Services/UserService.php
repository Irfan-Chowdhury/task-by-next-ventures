<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;

final Class UserService
{

    public function __construct(public UserRepository $userRepository){}

    public function getAllData()
    {
        $users = $this->userRepository->getAll();

        return UserResource::collection($users);
    }
}
