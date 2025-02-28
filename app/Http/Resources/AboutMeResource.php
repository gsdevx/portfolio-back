<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutMeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'education' => EducationResource::collection($this->education),
            'workPlaces' => WorkPlaceResource::collection($this->workPlaces),
        ];
    }
}
