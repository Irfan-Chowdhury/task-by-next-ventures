<?php

namespace App\Providers;

use App\Contracts\RoleContract;
use App\Repositories\RoleRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }


    public function boot(): void
    {
        $this->app->bind(RoleContract::class, RoleRepository::class);
    }
}
