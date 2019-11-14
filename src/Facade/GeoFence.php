<?php

namespace Salman\GeoFence\Facades;

use Illuminate\Support\Facades\Facade;

class GeoFence extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'GeoFence';
    }

}
