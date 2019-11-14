<?php
/**
 * Created by PhpStorm.
 * User: salman
 * Date: 11/14/19
 * Time: 1:34 PM
 */

namespace Salman\GeoFence;

use Illuminate\Support\ServiceProvider;
use Salman\GeoFence\Commands\GeoFence;

class GeoFenceServiceProvider extends ServiceProvider
{

    public function register()
    {
       $this->LoadAndMergeConfig();
    }

    public function boot()
    {
        $this->LoadAndRegisterCommand();
    }

    protected function LoadAndMergeConfig()
    {
        $this->mergeConfigFrom(__DIR__.'/config/geofence.php','geofence');
        $this->publishes([
            __DIR__.'/config/geofence.php' => config_path('geofence.php'),
        ]);
    }

    protected function LoadAndRegisterCommand()
    {
        $this->commands([
            GeoFence::class,
        ]);
    }

}
