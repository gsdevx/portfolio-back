<?php

declare(strict_types=1);

return [
    App\AdminPanel\Providers\AdminPanelProvider::class,
    App\Portfolio\Providers\ConsoleServiceProvider::class,
    App\Shared\Providers\AliasServiceProvider::class,
    App\Shared\Providers\AppServiceProvider::class,
    App\Shared\Providers\ViewServiceProvider::class,
    Jaybizzle\LaravelCrawlerDetect\LaravelCrawlerDetectServiceProvider::class,
];
