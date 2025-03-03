<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Domain\WorkCase\Repositories\WorkCaseRepository;
use App\Infrastructure\Persistence\ToolEloquentRepository;
use App\Infrastructure\Persistence\SocialEloquentRepository;
use App\Infrastructure\Persistence\ContactEloquentRepository;
use App\Infrastructure\Persistence\WorkCaseEloquentRepository;
use App\Infrastructure\Persistence\EducationEloquentRepository;
use App\Infrastructure\Persistence\WorkPlaceEloquentRepository;
use App\Domain\AboutMe\Repositories\ToolRepositoryWithActiveOrderedRecords;
use App\Domain\Footer\Repositories\SocialRepositoryWithActiveOrderedRecords;
use App\Domain\Footer\Repositories\ContactRepositoryWithActiveOrderedRecords;
use App\Domain\AboutMe\Repositories\EducationRepositoryWithActiveOrderedRecords;
use App\Domain\AboutMe\Repositories\WorkPlaceRepositoryWithActiveOrderedRecords;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        EducationRepositoryWithActiveOrderedRecords::class => EducationEloquentRepository::class,
        ToolRepositoryWithActiveOrderedRecords::class => ToolEloquentRepository::class,
        WorkPlaceRepositoryWithActiveOrderedRecords::class => WorkPlaceEloquentRepository::class,
        ContactRepositoryWithActiveOrderedRecords::class => ContactEloquentRepository::class,
        SocialRepositoryWithActiveOrderedRecords::class => SocialEloquentRepository::class,
        WorkCaseRepository::class => WorkCaseEloquentRepository::class,
    ];

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        JsonResource::withoutWrapping();

        Factory::guessFactoryNamesUsing(function (string $modelName): string {
            $modelName = Str::afterLast($modelName, '\\');

            return 'Database\Factories\\'.$modelName.'Factory';
        });
    }
}
