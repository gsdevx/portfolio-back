<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\getJson;

uses(RefreshDatabase::class);

test('Get about me static info', function () {
    getJson(route('api.v1.static.about-me'))
        ->assertOk()
        ->assertJson(fn(AssertableJson $json) => $json->whereAllType([
            'avatar' => 'string|null',
            'text' => 'string|null',
        ]));
});
