<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\WorkCase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class WorkCaseController extends Controller
{
    public function index(): View
    {
        $rememberForMinutes = 5;

        $workCases = Cache::remember('work_cases', 60 * $rememberForMinutes, static function (): Collection {
            return WorkCase::activeOrdered()->getMappedWithMethod('toDTO');
        });

        return view('pages/work-cases/index', compact('workCases'));
    }

    public function show(string $slug): View
    {
        $workCase = WorkCase::query()
            ->where(['is_active' => true, 'slug' => $slug])
            ->firstOrFail();

        return view('pages/work-cases/show', [
            'workCase' => $workCase->mapper()->toDTO(),
        ]);
    }
}
