<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\getJson;

uses(RefreshDatabase::class);

test('Get general settings', function () {
    getJson(route('api.v1.static.general-settings'))
        ->assertOk()
        ->assertJson(fn(AssertableJson $json) => $json->whereAllType([
            'siteEnabled' => 'boolean',
        ]));
});
