<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrustedHosts
{
    public function handle(Request $request, Closure $next): Response
    {
        $allowedHosts = config('hosts.allowed');

        if (!in_array($request->getHost(), $allowedHosts)) {
            return response()->json(['error' => 'Unauthorized.'], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
