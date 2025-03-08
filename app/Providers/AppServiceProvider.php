<?php

declare(strict_types=1);

namespace App\Providers;

use App\Contracts\Model\Mappable;
use App\Models\WorkCase;
use App\Observers\WorkCaseObserver;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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

        Builder::macro('getMappedWithMethod', function (string $method, mixed ...$args) {
            $models = $this->get();

            return $models->map(function (Model $model) use ($method, $args) {
                if (! $model instanceof Mappable) {
                    throw new Exception(sprintf('Model should implement %s interface', Mappable::class));
                }

                return $model->mapper()->$method(...$args);
            });
        });
    }
}
