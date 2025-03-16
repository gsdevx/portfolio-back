<?php

declare(strict_types=1);

namespace App\Portfolio\Http\Controllers;

use App\Portfolio\Mappers\Partial\ProfileMapper;
use App\Portfolio\Repositories\EducationRepository;
use App\Portfolio\Repositories\ToolRepository;
use App\Portfolio\Repositories\WorkPlaceRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    public function __construct(
        private readonly EducationRepository $educationRepository,
        private readonly WorkPlaceRepository $workPlaceRepository,
        private readonly ToolRepository $toolRepository,
    ) {}

    public function __invoke(): View
    {
        $mapper = new ProfileMapper(
            educationDTOs: $this->educationRepository->getActiveOrdered(),
            workPlaceDTOs: $this->workPlaceRepository->getActiveOrdered(),
            toolDTOs: $this->toolRepository->getActiveOrdered()
        );

        return view('pages.profile', $mapper->toDTO());
    }
}
