<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\M_brand_profile;

class BrandProfileProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $id = 1;
            $brand_profile = M_brand_profile::where('id', $id)->first();

            $view->with('brand_profile', $brand_profile);
        });
    }

    public function register()
    {
        //
    }
}
