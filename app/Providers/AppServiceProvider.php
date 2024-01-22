<?php

namespace App\Providers;

use App\Repositories\AdminRepository;
use App\Repositories\AdminTypeRepository;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(RepositoryInterface::class, BaseRepository::class);
        $this->app->bind(BaseRepository::class, AdminRepository::class);
        $this->app->bind(BaseRepository::class, AdminTypeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
