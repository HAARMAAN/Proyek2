<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo('/login');

        $middleware->redirectUsersTo(function () {
            if (Auth::guard('web')->check()) {
                $user = Auth::guard('web')->user();
                return $user->role === 'admin' ? route('admin.dashboard') : route('customer.dashboard');
            } elseif (Auth::guard('pelanggan')->check()) {
                return route('customer.dashboard');
            }
            return '/login';
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();