<?php

declare(strict_types=1);

return [
    App\Shared\Providers\ModuleServiceProvider::class,
    App\AdminPanel\Providers\ModuleServiceProvider::class,
    App\Portfolio\Providers\ModuleServiceProvider::class,
    App\Report\Providers\ModuleServiceProvider::class,
    Jaybizzle\LaravelCrawlerDetect\LaravelCrawlerDetectServiceProvider::class,
];
