<?php

declare(strict_types=1);

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\getJson;

uses(RefreshDatabase::class);

test('Get active contacts', function () {
    $activeCount = 5;
    $inactiveCount = 2;

    Contact::factory()
        ->inactive()
        ->count($inactiveCount)
        ->create();
    Contact::factory()
        ->active()
        ->count($activeCount)
        ->create();

    getJson(route('api.v1.contacts.index'))
        ->assertOk()
        ->assertJson(function (AssertableJson $json) use ($activeCount): void {
            $json->count($activeCount)
                ->each(fn(AssertableJson $json) => $json->whereAllType([
                    'title' => 'string',
                    'url' => 'string'
                ]));
        });
});
