<?php

declare(strict_types=1);

use function Pest\Laravel\postJson;

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Set page visit is successfull', function () {
    $path = '/cases';
    $userAgent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36';

    postJson(route('api.v1.page-visit'), [
        'path' => $path,
        'userAgent' => $userAgent,
    ])
        ->assertOk();
});

test('Set page visit has validation errors', function () {

    postJson(route('api.v1.page-visit'))
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['path', 'userAgent']);
});
