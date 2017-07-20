<?php

namespace Stomas\Footballdataparser;

use Illuminate\Support\ServiceProvider;

class FootballDataServiceProvider extends ServiceProvider
    {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        include __DIR__ . '/Routes.php';

        $this->publishes([
            __DIR__.'/Views/assets' => public_path(),
        ], 'public');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        //Controller
        $this->app->make('Stomas\Footballdataparser\Controllers\FootballDataController');


        //Views
        $this->loadViewsFrom(__DIR__ . '/Views', 'footballdata');
    }
}
