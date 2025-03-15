<?php

declare(strict_types=1);

namespace App\Shared\Providers;

use App\Portfolio\Mappers\Partial\FooterMapper;
use App\Portfolio\Models\Contact;
use App\Portfolio\Models\Social;
use App\Settings\Mappers\GeneralSettingsMapper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Jaybizzle\LaravelCrawlerDetect\Facades\LaravelCrawlerDetect;

class ModuleServiceProvider extends ServiceProvider
{
    private array $aliases = [
        'Crawler' => LaravelCrawlerDetect::class,
    ];

    public function register(): void
    {
        $this->registerAliases();
        $this->registerMacros();
    }

    public function boot(): void
    {
        $this->bootViewSharing();
    }

    private function registerAliases(): void
    {
        $loader = AliasLoader::getInstance();

        foreach ($this->aliases as $alias => $class) {
            $loader->alias($alias, $class);
        }
    }

    private function registerMacros(): void
    {
        Builder::macro('getMappedWithMethod', fn (string $method, mixed ...$args): Collection => map_model_collection($this->get(), $method, $args));
    }

    private function bootViewSharing(): void
    {
        View::composer('partials.footer', function (\Illuminate\View\View $view) {
            $view->with('footer', (new FooterMapper(
                socialDTOs: Social::activeOrdered()->getMappedWithMethod('toDTO'),
                contactDTOs: Contact::activeOrdered()->getMappedWithMethod('toDTO'),
            ))->toDTO());
        });

        View::share('generalSettings', GeneralSettingsMapper::makeFromAppContainer()->toDTO());
    }
}
