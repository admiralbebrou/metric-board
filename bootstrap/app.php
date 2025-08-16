<?php

use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        $middleware->redirectGuestsTo(fn () => route('login'));
        $middleware->api(prepend: [
            EnsureFrontendRequestsAreStateful::class
        ]);

        $middleware->validateCsrfTokens(except: [
            'login',
            'register',
            '/api/*'
        ]);

        $middleware->web(\App\Http\Middleware\HandleInertiaRequests::class);


    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
