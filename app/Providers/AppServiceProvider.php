<?php

namespace App\Providers;

use App\Models\Site;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('sites')) {
            Cache::forever('sites', Site::first());
        }
    }
}
