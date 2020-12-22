<?php

namespace App\Providers;

use App\Repository\Eloquent\SectionRepository;
use app\Repository\EloquentRepositoryInterface;
use App\Repository\SectionRepositoryInterface;
use BaseRepository;
use Illuminate\Support\ServiceProvider;
use TaskRepository;
use TaskRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
    }
}
