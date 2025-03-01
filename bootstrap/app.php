<?php

use App\Domain\Shared\Exceptions\ModelNotFoundException;
use App\Domain\Shared\Exceptions\UnauthorizedException;
use App\Infrastructure\Http\Middleware\TrustedHosts;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__ . '/../routes/api.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api([
            TrustedHosts::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (ModelNotFoundException $e, Request $request): JsonResponse|Exception {
            if ($request->is('api/*')) {
                return response()->json(['message' => $e->getMessage()], 404);
            }

            return $e;
        });

        $exceptions->render(function (UnauthorizedException $e, Request $request): JsonResponse|Exception {
            if ($request->is('api/*')) {
                return response()->json(['message' => $e->getMessage()], 401);
            }

            return $e;
        });
    })->create();
