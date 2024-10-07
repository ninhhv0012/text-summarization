<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Summary;

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
        //get summary order by created_at and limit 10
        $summaries = Summary::orderBy('created_at', 'desc')->limit(10)->get();
        view()->share('summaries', $summaries);
    }
}
