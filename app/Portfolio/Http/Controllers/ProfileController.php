<?php

declare(strict_types=1);

namespace App\Portfolio\Http\Controllers;

use App\Portfolio\Action\Education\Get\GetActiveOrdered as GetEducations;
use App\Portfolio\Action\Tool\Get\GetActiveOrdered as GetTools;
use App\Portfolio\Action\WorkPlace\Get\GetActiveOrdered as GetWorkPlaces;
use App\Portfolio\Mappers\Partial\ProfileMapper;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    public function __invoke(
        GetEducations $getEducations,
        GetWorkPlaces $getWorkPlaces,
        GetTools $getTools
    ): View {
        $mapper = new ProfileMapper(
            educationDTOs: $getEducations(),
            workPlaceDTOs: $getWorkPlaces(),
            toolDTOs: $getTools()
        );

        return view('pages.profile', $mapper->toDTO());
    }
}
