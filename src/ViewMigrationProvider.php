<?php

namespace MikhailMouner\GenerateViewFile;

use Illuminate\Support\ServiceProvider;
use MikhailMouner\GenerateViewFile\Console\Commands\MakeViewFile;

class ViewMigrationProvider extends ServiceProvider
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
        $appPath = __DIR__ . '/../stubs/';

        $this->publishes([
            $appPath => app_path('stubs/'),
        ], 'view-stubs');

        $this->commands([
            MakeViewFile::class,
        ]);
    }
}
