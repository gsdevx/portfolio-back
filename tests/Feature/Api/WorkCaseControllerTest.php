<?php

declare(strict_types=1);

use App\Models\WorkCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\getJson;

uses(RefreshDatabase::class);

test('Get active work cases', function () {
    $activeCount = 4;
    $inactiveCount = 12;

    WorkCase::factory()
        ->inactive()
        ->count($inactiveCount)
        ->create();
    WorkCase::factory()
        ->active()
        ->count($activeCount)
        ->create();

    getJson(route('api.v1.cases.index'))
        ->assertOk()
        ->assertJson(function (AssertableJson $json) use ($activeCount): void {
            $json->count($activeCount)
                ->each(fn(AssertableJson $json) => $json->whereAllType([
                    'slug' => 'string',
                    'preview' => 'string|null',
                    'image' => 'string|null',
                    'title' => 'string',
                    'summary' => 'string|null',
                    'description' => 'string|null',
                    'tags' => 'array|null',
                ]));
        });
});

test('Get active work case by ID', function () {
    $case = WorkCase::factory()->active()->create();

    getJson(route('api.v1.cases.show', $case))
        ->assertOk()
        ->assertJson([
            'slug' => $case->slug,
            'preview' => $case->preview,
            'image' => $case->image,
            'title' => $case->title,
            'summary' => $case->summary,
            'description' => $case->description,
            'tags' => $case->tags,
        ]);

    $case->update(['is_active' => false]);

    getJson(route('api.v1.cases.show', $case))
        ->assertNotFound();
});
