<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Mappers\Request\PageVisitRequestMapper;
use App\Services\PageVisitService;
use Closure;
use Crawler;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PageVisitMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Crawler::isCrawler() && auth()->guest()) {
            $mapper = new PageVisitRequestMapper($request);
            PageVisitService::makeRecord($mapper->toDTO());
        }

        return $next($request);
    }
}
