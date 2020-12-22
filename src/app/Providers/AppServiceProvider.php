<?php

namespace App\Providers;

use App\Repository\Eloquent\TaskRepository;
use App\Repository\TaskRepositoryInterface;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(TaskRepositoryInterface::class, TaskRepository::class);
    }
}
