<?php

namespace Zephia\LaravelPilot;

use Illuminate\Support\ServiceProvider;
use Zephia\PilotApiClient\Client\PilotApiClient;

class PilotServiceProvider extends ServiceProvider
{
    protected $packageName = 'LaravelPilot';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . 'config/pilot.php' => config_path('pilot.php'),
        ], 'config');

        $this->app->bind('pilot', function ($app) {
            return (new PilotApiClient([
                'app_key' => config($this->packageName . '.app_key'),
                'debug'   => config($this->packageName . '.debug')
            ]));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/zleader.php', $this->packageName);
    }
}
