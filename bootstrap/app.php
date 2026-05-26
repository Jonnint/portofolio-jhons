<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustProxies(at: '*');
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (\Throwable $e) {
            $logContent = "Exception: " . $e->getMessage() . "\n" .
                          "File: " . $e->getFile() . ":" . $e->getLine() . "\n" .
                          "Trace:\n" . $e->getTraceAsString() . "\n\n";
            file_put_contents(public_path('err.txt'), $logContent);
            return null; // Let Laravel render normally as well
        });
    })->create();
