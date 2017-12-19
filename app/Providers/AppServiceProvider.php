<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Increase default length so that we don't run into errors
        // https://laravel-news.com/laravel-5-4-key-too-long-error
        Schema::defaultStringLength(191);

        // extension for validation new rules
        // http://blog.elenakolevska.com/laravel-alpha-validator-that-allows-spaces/
        Validator::extend('alphanum_space', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[\w ]+$/', $value);
        });

        Validator::extend('must_be_empty', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^$/i', $value);
        });
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
