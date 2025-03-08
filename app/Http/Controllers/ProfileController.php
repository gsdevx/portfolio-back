<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTOs\Partial\ProfileDTO;
use App\Mappers\Partial\ProfileMapper;
use App\Models\Education;
use App\Models\Tool;
use App\Models\WorkPlace;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{
    public function __invoke(): View
    {
        $rememberForMinutes = 5;

        $data = Cache::remember('profile', 60 * $rememberForMinutes, static function (): ProfileDTO {
            $mapper = new ProfileMapper(
                educationDTOs: Education::activeOrdered()->getMappedWithMethod('toDTO'),
                workPlaceDTOs: WorkPlace::activeOrdered()->getMappedWithMethod('toDTO'),
                toolDTOs: Tool::activeOrdered()->getMappedWithMethod('toDTO')
            );

            return $mapper->toDTO();
        });

        return view('pages/profile', $data);
    }
}
