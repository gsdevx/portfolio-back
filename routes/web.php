<?php

declare(strict_types=1);

use App\Portfolio\Http\Controllers\ProfileController;
use App\Portfolio\Http\Controllers\WorkCaseController;
use App\VisitLog\Http\Middleware\VisitLogMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(VisitLogMiddleware::class)->group(static function (): void {
    Route::get('/', ProfileController::class)->name('profile');

    Route::get('work-cases', [WorkCaseController::class, 'index'])->name('work-cases.index');
    Route::get('work-cases/{slug}', [WorkCaseController::class, 'show'])->name('work-cases.show');
});
