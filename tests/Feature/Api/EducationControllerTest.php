<?php

declare(strict_types=1);

use App\Domain\AboutMe\Models\Education;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\getJson;

uses(RefreshDatabase::class);

test('Get active educations', function () {
    $activeCount = 12;
    $inactiveCount = 1;

    Education::factory()
        ->inactive()
        ->count($inactiveCount)
        ->create();
    Education::factory()
        ->active()
        ->count($activeCount)
        ->create();

    getJson(route('api.v1.educations.index'))
        ->assertOk()
        ->assertJson(function (AssertableJson $json) use ($activeCount): void {
            $json->count($activeCount)
                ->each(fn(AssertableJson $json) => $json->whereAllType([
                    'institutionName' => 'string',
                    'profession' => 'string',
                    'description' => 'string',
                    'startDate' => 'string',
                    'endDate' => 'string',
                ]));
        });
});
