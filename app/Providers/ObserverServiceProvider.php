<?php

namespace App\Providers;

use App\Models\AdZone;
use App\Observers\AdZoneObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
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
        AdZone::observe(AdZoneObserver::class);
    }
}
