<?php

declare(strict_types=1);

use function Pest\Laravel\getJson;

use App\Domain\AboutMe\Models\Tool;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
                ->each(fn (AssertableJson $json) => $json->whereAllType([
                    'title' => 'string',
                ]));
        });
});
