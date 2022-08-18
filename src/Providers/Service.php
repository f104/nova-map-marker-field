<?php namespace F104\NovaMapMarkerField\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class Service extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../dist/images/vendor' => public_path('images'),
        ], 'assets');

        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-map-marker-field', __DIR__ . '/../../dist/js/field.js');
        });
    }

    public function register()
    {
        //
    }
}
