<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('greater_than', function($attribute, $value, $parameters, $validator){
            $value = (float) $value;
            $other_field = $parameters[0];
            $data = $validator->getData();
            $other_value = (float) $data[$other_field];
            return ($value > $other_value);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if($this->app->environment() === 'local') {
            $this->app->register(\Orangehill\Iseed\IseedServiceProvider::class);
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
