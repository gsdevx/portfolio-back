<?php

declare(strict_types=1);

use App\Models\Tool;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\getJson;

uses(RefreshDatabase::class);

test('Get active socials', function () {
    $activeCount = 14;
    $inactiveCount = 2;

    Tool::factory()
        ->inactive()
        ->count($inactiveCount)
        ->create();
    Tool::factory()
        ->active()
        ->count($activeCount)
        ->create();

    getJson(route('api.v1.tools.index'))
        ->assertOk()
        ->assertJson(function (AssertableJson $json) use ($activeCount): void {
            $json->count($activeCount)
                ->each(fn(AssertableJson $json) => $json->whereAllType([
                    'title' => 'string',
                ]));
        });
});
