<?php

declare(strict_types=1);

namespace App\VisitLog\Http\Middleware;

use App\VisitLog\Action\MakeLog;
use App\VisitLog\Mappers\VisitLogRequestMapper;
use Closure;
use Crawler;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

readonly class VisitLogMiddleware
{
    public function __construct(private MakeLog $makeLog) {}

    public function handle(Request $request, Closure $next): Response
    {
        if (! Crawler::isCrawler() && auth()->guest()) {
            $mapper = new VisitLogRequestMapper($request);
            $this->makeLog->__invoke($mapper->toDTO());
        }

        return $next($request);
    }
}
