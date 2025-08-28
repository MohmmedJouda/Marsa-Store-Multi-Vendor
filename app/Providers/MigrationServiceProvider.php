<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MigrationServiceProvider extends ServiceProvider
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
        $this->loadMigrationsFrom(database_path('migrations/Product'));
        $this->loadMigrationsFrom(database_path('migrations/Vendor'));
        $this->loadMigrationsFrom(database_path('migrations/Category'));
        $this->loadMigrationsFrom(database_path('migrations/Customer'));
        $this->loadMigrationsFrom(database_path('migrations/Users'));

    }
}
