<?php

namespace Salman\GeoFence\Commands;

use Illuminate\Console\Command;
use Salman\GeoFence\Service\GeoFenceService;

class GeoFence extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'geo:fence';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate distance between two longitude and latitudes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("**************************************************");
        $this->info("* Welcome To Geo Fence Calculator                *");
        $this->info("**************************************************");

        $lat1  = $this->ask('Enter latitude 1: ');
        $lat2  = $this->ask('Enter latitude 2: ');
        $long1 = $this->ask('Enter Longitude 1: ');
        $long2 = $this->ask('Enter Longitude 2: ');
        $unit = $this->ask('Enter Unit k\M: ');

        if (empty($lat1) || empty($lat2) || empty($long1) || empty($long2) || empty($unit))
        {
            $this->info('Please add all the values. Exiting');
        }

        $output = GeoFenceService::MeasureDistance($lat1, $long1, $lat2, $long2, $unit);

        $this->info('Measured distance is: '. $output. ' '. $unit);
    }
}
