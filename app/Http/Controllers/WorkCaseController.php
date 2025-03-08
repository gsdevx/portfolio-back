<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\WorkCase;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class WorkCaseController extends Controller
{
    public function index(): View
    {
        $workCases = Cache::rememberForever('work_cases', static function (): EloquentCollection|SupportCollection {
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
