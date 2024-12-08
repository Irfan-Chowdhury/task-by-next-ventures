<?php

namespace App\Providers;

use App\Contracts\PermissionContract;
use App\Contracts\RoleContract;
use App\Contracts\UserContract;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }


    public function boot(): void
    {
        $this->app->bind(PermissionContract::class, PermissionRepository::class);
        $this->app->bind(RoleContract::class, RoleRepository::class);
        $this->app->bind(UserContract::class, UserRepository::class);
    }
}
