<?php


namespace Salman\GeoFence\Service;


class GeoFenceCalculator
{
    protected $unit = null;

    public function __construct()
    {
        $this->unit = config('geofence.unit');
    }

    public function CalculateDistance($lat1, $long1, $lat2, $long2)
    {
        $distance = GeoFenceService::MeasureDistance($lat1, $long1, $lat2, $long2, $this->unit);

        return $distance;
    }
}
