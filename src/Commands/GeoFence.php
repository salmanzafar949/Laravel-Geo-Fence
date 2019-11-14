<?php

namespace Salman\GeoFence\Commands;

use Illuminate\Console\Command;

class GeoFence extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'geo:fence {long1: longitude} {long2: longitude} {lat1: latitude} {lat2: latitude}';

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
        //
    }
}
