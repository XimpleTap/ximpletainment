<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $videoCategories = DB::table('video_categories')->get();
        $audioGenres = DB::table('audio_genres')->get();
        view()->share('audioGenres', $audioGenres);
        view()->share('videoCategories', $videoCategories);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
