<?php

declare(strict_types=1);

namespace App\Shared\Providers;

use App\Portfolio\Mappers\Partial\FooterMapper;
use App\Portfolio\Models\Contact;
use App\Portfolio\Models\Social;
use App\Settings\Mappers\GeneralSettingsMapper;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
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
