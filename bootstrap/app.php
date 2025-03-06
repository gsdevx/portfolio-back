<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Domain\Shared\Exceptions\UnauthorizedException;
use App\Domain\Shared\Exceptions\ModelNotFoundException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
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
