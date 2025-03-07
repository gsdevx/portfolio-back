<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\WorkCase;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class WorkCaseController extends Controller
{
    public function index(): View
    {
        return view('pages/work-cases/index', [
            'workCases' => WorkCase::activeOrdered()->getMappedWithMethod('toDTO'),
        ]);
    }

    public function show(string $slug): View
    {
        $workCase = WorkCase::query()
            ->where([
                'is_active' => true,
                'slug' => $slug,
            ])
            ->firstOrFail();

        return view('pages/work-cases/show', [
            'workCase' => $workCase->mapper()->toDTO(),
        ]);
    }
}
