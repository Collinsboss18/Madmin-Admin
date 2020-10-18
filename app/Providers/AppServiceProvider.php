<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Photo;

class AppServiceProvider extends ServiceProvider
{
    public function photoId() {
        if(Auth::check()){
            return Photo::where('id', Auth::user()->photo_id)->get(['file']);
        }
        return '';
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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using composer to make variables global
        view()->composer('*', function($view) {
            $view->with('profile', $this->photoId());
        });
    }
}
