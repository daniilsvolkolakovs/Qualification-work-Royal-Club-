<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Console\Commands\RemovePastBookings;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        $middleware->alias([
            'admin' => \App\Http\Middleware\Admin::class,
            'manager' => \App\Http\Middleware\Manager::class,
        ]);

        
        $middleware->web(append:[
            App\Http\Middleware\LocalizationMiddleware::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

    Artisan::command('bookings:remove-past', function () {
        Artisan::call(RemovePastBookings::class);
    })->describe('Removes outdated bookings daily');
    
    $schedule->command('bookings:remove-past')->daily();