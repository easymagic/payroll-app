<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        //

        Schema::defaultStringLength(191);

        view()->share('selected',function($value){
            if ($value){
                return ' selected ';
            }

            return '';

        });

        view()->share('status_badge',function($value,$text){
           if ($value == 1){
               return '<span class="badge-success col-md-1">' . $text . '</span>';
           }

            if ($value == 0){
                return '<span class="badge-danger col-md-1">' . $text . '</span>';
            }

        });

    }

}
