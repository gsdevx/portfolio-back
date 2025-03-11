<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\WorkCase;
use App\Observers\WorkCaseObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        WorkCase::observe(WorkCaseObserver::class);

        Builder::macro('getMappedWithMethod', fn (string $method, mixed ...$args): Collection => map_model_collection($this->get(), $method, $args));
    }
}
