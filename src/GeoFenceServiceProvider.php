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
use Salman\GeoFence\Service\GeoFenceCalculator;

class GeoFenceServiceProvider extends ServiceProvider
{

    public function register()
    {
       $this->LoadAndMergeConfig();
       $this->ConvertToSingleton();
    }

    public function boot()
    {
        $this->LoadAndRegisterCommand();
    }

    /**
     * @return array
     */
    public function provides()
    {
        return ['GeoFence'];
    }


    protected function ConvertToSingleton()
    {
        $this->app->singleton('GeoFence',function (){

            return new GeoFenceCalculator();
        });
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
