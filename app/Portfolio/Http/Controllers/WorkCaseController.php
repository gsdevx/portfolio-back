<?php

declare(strict_types=1);

namespace App\Portfolio\Http\Controllers;

use App\Portfolio\Action\WorkCase\Cache\GetOrRemember;
use App\Portfolio\Action\WorkCase\Get\FindBySlug;
use App\Portfolio\Action\WorkCase\Get\FindSimilar;
use App\Portfolio\Action\WorkCase\Get\GetPaginatedList;
use App\Portfolio\DTO\WorkCaseDTO;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class WorkCaseController extends Controller
{
    public function index(
        Request $request,
        GetPaginatedList $getWorkCases,
        GetOrRemember $getOrRemember
    ): View {
        $paginator = $getOrRemember->workCasesPaginated(
            (int) $request->query('page', 1),
            fn (): Paginator => $getWorkCases()
        );

        return view('pages.work-cases.index', compact('paginator'));
    }

    public function show(
        string $slug,
        FindBySlug $findBySlug,
        FindSimilar $findSimilar,
        GetOrRemember $getOrRemember,
    ): View {
        $workCase = $getOrRemember->workCase($slug, fn (): WorkCaseDTO => $findBySlug($slug));
        $similar = $getOrRemember->similar($slug, fn (): Collection => $findSimilar($workCase));

        return view('pages.work-cases.show', compact('workCase', 'similar'));
    }
}
