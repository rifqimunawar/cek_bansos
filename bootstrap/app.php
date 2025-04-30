<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;




// return Application::configure(basePath: dirname(__DIR__))
//   ->withRouting(
//     web: __DIR__ . '/../routes/web.php',
//     api: __DIR__.'/../routes/api.php',
//     commands: __DIR__ . '/../routes/console.php',
//     // channels: __DIR__.'/../routes/channels.php',
//   )
//   ->withMiddleware(function (Middleware $middleware) {
//     $middleware->alias([
//       'check.permission' => \App\Http\Middleware\CheckUserPermission::class,
//     ]);
//   })
//   ->create();

return Application::configure(basePath: dirname(__DIR__))
  ->withRouting(
    web: __DIR__ . '/../routes/web.php',
    api: __DIR__ . '/../routes/api.php',
    commands: __DIR__ . '/../routes/console.php',
    health: '/up',
  )
  ->withMiddleware(function (Middleware $middleware) {
    // Middleware hanya untuk global, tidak perlu menambahkan Sanctum di sini
  })
  ->withExceptions(function (Exceptions $exceptions) {
    // Menangani error auth untuk API agar merespons JSON
    $exceptions->renderable(function (\Illuminate\Auth\AuthenticationException $e, $request) {
      if ($request->is('api/*')) {
        return response()->json([
          'status' => false,
          'message' => 'Unauthenticated. Silakan login untuk mengakses API.',
        ], 401);
      }
    });
  })
  ->create();
