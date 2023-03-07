<?php

namespace Wiklog\WiklogInputs;

use Illuminate\Support\ServiceProvider;
use Wiklog\WiklogInputs\commands\PublishInputs;

class InputsServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('wiklog-inputs:publish', function ($app) {
            return new PublishInputs();
        });

        $this->commands([
            'wiklog-inputs:publish',
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {}
}
