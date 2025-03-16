<?php

declare(strict_types=1);

namespace App\AdminPanel\Providers;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use TomatoPHP\FilamentMediaManager\FilamentMediaManagerPlugin;

class ModuleServiceProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::hex('#000'),
            ])
            ->favicon(asset('favicon.png'))
            ->discoverResources(in: app_path('AdminPanel/Filament/Resources'), for: 'App\\AdminPanel\\Filament\\Resources')
            ->discoverPages(in: app_path('AdminPanel/Filament/Pages'), for: 'App\\AdminPanel\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('AdminPanel/Filament/Widgets'), for: 'App\\AdminPanel\\Filament\\Widgets')
            ->widgets([
                \App\AdminPanel\Filament\Widgets\PageVisitsStatsOverview::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugin(FilamentMediaManagerPlugin::make())
            ->navigationItems([
                NavigationItem::make('Перейти на сайт')
                    ->url(url('/'), shouldOpenInNewTab: true)
                    ->icon('heroicon-o-computer-desktop'),
            ]);
    }
}
