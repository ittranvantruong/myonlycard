<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ComponentProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::component('alert', \App\View\Components\Alert::class);
        Blade::component('form', \App\View\Components\Form::class);
        Blade::component('input', \App\View\Components\Input\Input::class);
        Blade::component('input-phone', \App\View\Components\Input\InputPhone::class);
        Blade::component('input-email', \App\View\Components\Input\InputEmail::class);
        Blade::component('input-password', \App\View\Components\Input\InputPassword::class);
    }
}
