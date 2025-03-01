<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Middleware;

use App\Domain\Shared\Exceptions\UnauthorizedException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrustedHosts
{
    public function handle(Request $request, Closure $next): Response
    {
        $allowedHosts = config('hosts.allowed');

        if (!in_array($request->getHost(), $allowedHosts)) {
            throw new UnauthorizedException();
        }

        return $next($request);
    }
}
