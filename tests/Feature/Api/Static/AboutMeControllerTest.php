<?php

declare(strict_types=1);

use function Pest\Laravel\getJson;

use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Get about me static info', function () {
    getJson(route('api.v1.static.about-me'))
        ->assertOk()
        ->assertJson(fn (AssertableJson $json) => $json->whereAllType([
            'avatar' => 'string|null',
            'text' => 'string|null',
        ]));
});
