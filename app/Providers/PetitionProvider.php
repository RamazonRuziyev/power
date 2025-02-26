<?php

namespace App\Providers;

use App\view\PetitionComposer;
use Illuminate\Support\ServiceProvider;

class PetitionProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('admin.partial.navbar',PetitionComposer::class);
    }
}
