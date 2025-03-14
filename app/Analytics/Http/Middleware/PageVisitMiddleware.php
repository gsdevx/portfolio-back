<?php

declare(strict_types=1);

namespace App\Analytics\Http\Middleware;

use App\Analytics\Http\Request\PageVisitRequestMapper;
use App\Analytics\Services\PageVisitService;
use Closure;
use Crawler;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PageVisitMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! Crawler::isCrawler() && auth()->guest()) {
            $mapper = new PageVisitRequestMapper($request);
            PageVisitService::makeRecord($mapper->toDTO());
        }

        return $next($request);
    }
}
