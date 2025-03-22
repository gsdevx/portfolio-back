<?php

declare(strict_types=1);

namespace App\Portfolio\Providers;

use App\Portfolio\Console\Commands\ConvertWorkCasesPreviewImagesToWebp;
use App\Portfolio\Models\WorkCase;
use App\Portfolio\Observers\WorkCaseObserver;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    private array $commands = [
        ConvertWorkCasesPreviewImagesToWebp::class,
    ];

    private array $modelObservers = [
        WorkCase::class => WorkCaseObserver::class,
    ];

    public function register(): void
    {
        $this->registerConsoleCommands();
    }

    public function boot(): void
    {
        $this->bootModelObservers();
    }

    private function registerConsoleCommands(): void
    {
        $this->commands($this->commands);
    }

    private function bootModelObservers(): void
    {
        /** @var class-string $model */
        foreach ($this->modelObservers as $model => $observerClass) {
            $model::observe($observerClass);
        }
    }
}
