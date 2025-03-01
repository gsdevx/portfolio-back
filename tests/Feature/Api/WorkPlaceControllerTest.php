<?php

declare(strict_types=1);

use App\Domain\AboutMe\Models\WorkPlace;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\getJson;

uses(RefreshDatabase::class);

test('Get active work places', function () {
    $activeCount = 12;
    $inactiveCount = 1;

    WorkPlace::factory()
        ->inactive()
        ->count($inactiveCount)
        ->create();
    WorkPlace::factory()
        ->active()
        ->count($activeCount)
        ->create();

    getJson(route('api.v1.work-places.index'))
        ->assertOk()
        ->assertJson(function (AssertableJson $json) use ($activeCount): void {
            $json->count($activeCount)
                ->each(fn(AssertableJson $json) => $json->whereAllType([
                    'companyName' => 'string',
                    'jobTitle' => 'string',
                    'description' => 'string',
                    'startDate' => 'string',
                    'endDate' => 'string',
                ]));
        });
});
