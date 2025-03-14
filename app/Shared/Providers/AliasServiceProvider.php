<?php

declare(strict_types=1);

namespace App\Shared\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Jaybizzle\LaravelCrawlerDetect\Facades\LaravelCrawlerDetect;

class AliasServiceProvider extends ServiceProvider
{
    private static array $aliases = [
        'Crawler' => LaravelCrawlerDetect::class,
    ];

    public function register(): void
    {
        $loader = AliasLoader::getInstance();

        foreach (self::$aliases as $alias => $class) {
            $loader->alias($alias, $class);
        }
    }
}
