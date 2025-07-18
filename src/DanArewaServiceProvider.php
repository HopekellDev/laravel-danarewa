<?php

namespace HopekellDev\DanArewa;

use Illuminate\Support\ServiceProvider;

class DanArewaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/danarewa.php' => config_path('danarewa.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/danarewa.php', 'danarewa');

        $this->app->singleton('danarewa', function () {
            return new DanArewa();
        });
    }
}
