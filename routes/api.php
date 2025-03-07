<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['api'],
    'prefix' => 'v1',
    'as' => 'api.v1.',
], function (): void {});
