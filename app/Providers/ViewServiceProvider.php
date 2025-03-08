<?php

declare(strict_types=1);

namespace App\Providers;

use App\Mappers\GeneralSettingsMapper;
use App\Mappers\Partial\FooterMapper;
use App\Models\Contact;
use App\Models\Social;
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
