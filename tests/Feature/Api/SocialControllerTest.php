<?php

declare(strict_types=1);

use App\Models\Social;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\getJson;

uses(RefreshDatabase::class);

test('Get active socials', function () {
    $activeCount = 1;
    $inactiveCount = 2;

    Social::factory()
        ->inactive()
        ->count($inactiveCount)
        ->create();
    Social::factory()
        ->active()
        ->count($activeCount)
        ->create();

    getJson(route('api.v1.socials.index'))
        ->assertOk()
        ->assertJson(function (AssertableJson $json) use ($activeCount): void {
            $json->count($activeCount)
                ->each(fn(AssertableJson $json) => $json->whereAllType([
                    'title' => 'string',
                    'url' => 'string',
                    'icon' => 'string',
                ]));
        });
});
