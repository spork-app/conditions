<?php

namespace Spork\Conditions;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use Spork\Core\Models\FeatureList;
use Spork\Core\Spork;

class ConditionsServiceProvider extends RouteServiceProvider
{
    public function boot()
    {
      //
    }

    public function register()
    {
        FeatureList::extend('conditionals', fn () => $this->morphMany(Condition::class, 'conditionable'));
        Spork::loadWith(['conditionals']);
        $this->mergeConfigFrom(__DIR__.'/../config/spork.php', 'spork.conditions');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if (config('spork.conditions.enabled')) {
            Route::middleware($this->app->make('config')->get('spork.conditions.middleware', ['auth:sanctum']))
                ->prefix('api/conditions')
                ->group(__DIR__.'/../routes/web.php');
        }
    }
}
