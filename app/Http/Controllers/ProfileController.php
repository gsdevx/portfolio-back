<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Mappers\Partial\ProfileMapper;
use App\Models\Education;
use App\Models\Tool;
use App\Models\WorkPlace;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    public function __invoke(): View
    {
        return view('pages/profile', (new ProfileMapper(
            educationDTOs: Education::activeOrdered()->getMappedWithMethod('toDTO'),
            workPlaceDTOs: WorkPlace::activeOrdered()->getMappedWithMethod('toDTO'),
            toolDTOs: Tool::activeOrdered()->getMappedWithMethod('toDTO')
        ))->toDTO());
    }
}
