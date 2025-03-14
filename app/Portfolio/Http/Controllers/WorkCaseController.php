<?php

declare(strict_types=1);

namespace App\Portfolio\Http\Controllers;

use App\Portfolio\Action\WorkCase\FindBySlug;
use App\Portfolio\Action\WorkCase\GetPaginatedList;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class WorkCaseController extends Controller
{
    public function index(GetPaginatedList $getWorkCases): View
    {
        return view('pages.work-cases.index', [
            'paginator' => $getWorkCases(),
        ]);
    }

    public function show(string $slug, FindBySlug $findBySlug): View
    {
        return view('pages.work-cases.show', [
            'workCase' => $findBySlug($slug),
        ]);
    }
}
