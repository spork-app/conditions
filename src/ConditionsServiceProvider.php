<?php

namespace Spork\Conditions;

use App\Spork;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class ConditionsServiceProvider extends RouteServiceProvider
{
    public function boot()
    {
      //
    }
    
    public function register()
    {
        Spork::loadWith(['conditions']);

        if (config('spork.conditions.enabled')) {
            Route::middleware($this->app->make('config')->get('spork.conditions.middleware', ['auth:sanctum']))
                ->prefix('api/conditions')
                ->group(__DIR__ . '/../routes/web.php');
        }
    }
}
