<?php

declare(strict_types=1);

use function Pest\Laravel\getJson;

use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Get general settings', function () {
    getJson(route('api.v1.static.general-settings'))
        ->assertOk()
        ->assertJson(fn (AssertableJson $json) => $json->whereAllType([
            'siteEnabled' => 'boolean',
        ]));
});
