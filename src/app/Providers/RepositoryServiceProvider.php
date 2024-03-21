<?php

namespace App\Providers;

use App\Interfaces\DeficitHabitacionalRepositoryInterface;
use App\Interfaces\MunicipioRepositoryInterface;
use App\Interfaces\UnidadeRepositoryInterface;
use App\Repositories\DeficitHabitacionalRepository;
use App\Repositories\MunicipioRepository;
use App\Repositories\UnidadeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MunicipioRepositoryInterface::class, MunicipioRepository::class);
        $this->app->bind(UnidadeRepositoryInterface::class, UnidadeRepository::class);
        $this->app->bind(DeficitHabitacionalRepositoryInterface::class, DeficitHabitacionalRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
