<?php

declare(strict_types=1);

namespace App\Shared\Providers;

use App\Portfolio\Mappers\Partial\FooterMapper;
use App\Settings\Mappers\GeneralSettingsMapper;
use App\Shared\Action\Contact\Get\GetActiveOrdered as GetActiveOrderedContacts;
use App\Shared\Action\Social\Get\GetActiveOrdered as GetActiveOrderedSocials;
use App\Shared\Models\Contact;
use App\Shared\Models\Social;
use App\Shared\Observers\ContactObserver;
use App\Shared\Observers\SocialObserver;
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

    private array $modelObservers = [
        Social::class => SocialObserver::class,
        Contact::class => ContactObserver::class,
    ];

    public function register(): void
    {
        $this->registerAliases();
        $this->registerMacros();
    }

    public function boot(): void
    {
        $this->bootViewSharing();
        $this->bootModelObservers();
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
            $footerMapper = new FooterMapper(
                socialDTOs: app(GetActiveOrderedSocials::class)(),
                contactDTOs: app(GetActiveOrderedContacts::class)(),
            );

            $view->with('footer', $footerMapper->toDTO());
        });

        View::share('generalSettings', GeneralSettingsMapper::makeFromAppContainer()->toDTO());
    }

    private function bootModelObservers(): void
    {
        /** @var class-string $modelClass */
        foreach ($this->modelObservers as $modelClass => $observerClass) {
            $modelClass::observe($observerClass);
        }
    }
}
