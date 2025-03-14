<?php

declare(strict_types=1);

return [
    \App\Shared\Providers\AppServiceProvider::class,
    \App\AdminPanel\Providers\AdminPanelProvider::class,
    \App\Shared\Providers\ViewServiceProvider::class,
    \App\Shared\Providers\AliasServiceProvider::class,
    Jaybizzle\LaravelCrawlerDetect\LaravelCrawlerDetectServiceProvider::class,
];
