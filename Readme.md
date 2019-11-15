# Laravel GeoFence Package

A Laravel 5 and Laravel 6 package to calculate distance between two longitude and latitudes

## Installation
```
composer require salmanzafar/laravel-geo-fence
```

## Enable the package (Optional)

This package implements Laravel auto-discovery feature. After you install it the package provider and facade are added automatically for laravel >= 5.5.

__This step is only required if you are using laravel version <5.5__

To declare the provider and/or alias explicitly, then add the service provider to your config/app.php:

```
'providers' => [

        Salman\GeoFence\GeoFenceServiceProvider::class,
];
```
And then add the alias to your config/app.php:
```
'aliases' => [

       'GeoFence' => \Salman\GeoFence\Facades\GeoFence::class,
];
```
## Configuration
Publish the configuration file
```
php artisan vendor:publish --provider="Salman\GeoFence\GeoFenceServiceProvider"
```
## Config/geofence.php
```
return [

    "unit" => "k"  // get result in kilometers
    // change unit to M/m to get result in Miles
];
```
#### Using in Controller

```
use Salman\GeoFence\Service\GeoFenceCalculator;

 public function distance()
 {
        $d_calculator = new GeoFenceCalculator();

       $distance = $d_calculator->CalculateDistance('38.199020', '-77.969658', '37.090240', '-95.712891');

       return $distance;
 }

output: 1564.6
```
#### Measure Distance using Facade in Controller

```
use use GeoFence;

public function distance()
{
        $distance = GeoFence::CalculateDistance('38.199020', '-77.969658', '37.090240', '-95.712891');
        return $distance;
}

output: 1564.6
```
#### Measure Distance using command

```php
php artisan geo:fence

**************************************************
* Welcome To Geo Fence Calculator                *
**************************************************

 Enter latitude 1: :
 > 38.199020

 Enter latitude 2: :
 > 37.090240

 Enter Longitude 1: :
 > -77.969658

 Enter Longitude 2: :
 > -95.712891

 Enter Unit k\M: :
 > K

Measured distance is: 1564.6 K
```
### Tested on php 7.3 and laravel 5.7 and also laravel 5.8 and laravel 6.*
