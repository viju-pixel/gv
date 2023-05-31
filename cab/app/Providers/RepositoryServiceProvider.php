<?php

namespace App\Providers;


use App\Interfaces\AdminUserRepositoryInterface;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\CategoriesRepositoryInterface;

use App\Repositories\AdminUserRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(AdminUserRepositoryInterface::class, AdminUserRepository::class);
        $this->app->bind(CategoriesRepositoryInterface::class, CategoriesRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
