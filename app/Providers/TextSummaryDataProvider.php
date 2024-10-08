<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Request;

use App\Models\Summary;
use App\Models\Device;

class TextSummaryDataProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       // get summary order by created_at and limit 10
        $summaries = Summary::orderBy('updated_at', 'desc')->limit(10)->get();

        // get device order by ip
        $ip = Request::ip();
        $device = Device::where('ip', $ip)->first();
        if (!$device) {
            $device = Device::create(['ip' => $ip,
             'code' => 'new device']);
        }  
        view()->share(['summaries'=> $summaries, 'device' => $device]);
    }
}
