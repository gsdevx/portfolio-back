<?php

declare(strict_types=1);

namespace App\Portfolio\Http\Controllers;

use App\Portfolio\Mappers\Partial\ProfileMapper;
use App\Portfolio\Models\Education;
use App\Portfolio\Models\Tool;
use App\Portfolio\Models\WorkPlace;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    public function __invoke(): View
    {
        $mapper = new ProfileMapper(
            educationDTOs: Education::activeOrdered()->getMappedWithMethod('toDTO'),
            workPlaceDTOs: WorkPlace::activeOrdered()->getMappedWithMethod('toDTO'),
            toolDTOs: Tool::activeOrdered()->getMappedWithMethod('toDTO')
        );

        return view('pages.profile', $mapper->toDTO());
    }
}
