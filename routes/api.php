<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\ContactController;
use App\Http\Controllers\Api\V1\EducationController;
use App\Http\Controllers\Api\V1\SocialController;
use App\Http\Controllers\Api\V1\Static\AboutMeController;
use App\Http\Controllers\Api\V1\ToolController;
use App\Http\Controllers\Api\V1\WorkCaseController;
use App\Http\Controllers\Api\V1\WorkPlaceController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['api'],
    'prefix' => '/v1',
    'as' => 'api.v1.',
], function () {
    Route::apiResource('contacts', ContactController::class)
        ->only(['index']);

    Route::apiResource('socials', SocialController::class)
        ->only(['index']);

    Route::apiResource('educations', EducationController::class)
        ->only(['index']);

    Route::apiResource('work-places', WorkPlaceController::class)
        ->only(['index']);

    Route::apiResource('tools', ToolController::class)
        ->only(['index']);

    Route::apiResource('cases', WorkCaseController::class)
        ->parameters([
            'cases' => 'case:slug',
        ])
        ->only(['index', 'show']);

    Route::get('static/about-me', AboutMeController::class)
        ->name('static.about-me');
});
