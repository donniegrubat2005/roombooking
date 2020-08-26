<?php

namespace App\Providers;


use App\Repositories\ManageFacility\ManageFacilityInterface;
use App\Repositories\ManageFacility\ManageFacilityRepository;
use App\Repositories\User\UserInterface;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserInterface::class, UserRepository::class);
        $this->app->singleton(ManageFacilityInterface::class, ManageFacilityRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
