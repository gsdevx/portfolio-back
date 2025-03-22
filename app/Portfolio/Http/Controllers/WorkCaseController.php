<?php

declare(strict_types=1);

namespace App\Portfolio\Http\Controllers;

use App\Portfolio\Action\WorkCase\Get\FindBySlug;
use App\Portfolio\Action\WorkCase\Get\FindSimilar;
use App\Portfolio\Action\WorkCase\Get\GetPaginatedList;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class WorkCaseController extends Controller
{
    public function index(
        Request $request,
        GetPaginatedList $getWorkCases,
    ): View {
        $currentPage = (int) $request->query('page', 1);

        return view('pages.work-cases.index', [
            'paginator' => $getWorkCases($currentPage),
        ]);
    }

    public function show(
        string $slug,
        FindBySlug $findBySlug,
        FindSimilar $findSimilar,
    ): View {
        $workCase = $findBySlug($slug);
        $similar = $findSimilar($workCase);

        return view('pages.work-cases.show', compact('workCase', 'similar'));
    }
}
