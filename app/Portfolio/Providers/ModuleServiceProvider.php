<?php

declare(strict_types=1);

namespace App\Portfolio\Providers;

use App\Portfolio\Console\Commands\ConvertWorkCasesPreviewImagesToWebp;
use App\Portfolio\Models\Education;
use App\Portfolio\Models\Tool;
use App\Portfolio\Models\WorkCase;
use App\Portfolio\Models\WorkPlace;
use App\Portfolio\Observers\EducationObserver;
use App\Portfolio\Observers\ToolObserver;
use App\Portfolio\Observers\WorkCaseObserver;
use App\Portfolio\Observers\WorkPlaceObserver;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    private array $commands = [
        ConvertWorkCasesPreviewImagesToWebp::class,
    ];

    private array $modelObservers = [
        WorkCase::class => WorkCaseObserver::class,
        WorkPlace::class => WorkPlaceObserver::class,
        Education::class => EducationObserver::class,
        Tool::class => ToolObserver::class,
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
