<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'institutionName' => $this->institution_name,
            'profession' => $this->profession,
            'description' => $this->description,
            'startDate' => $this->start_date->format('d.m.Y'),
            'endDate' => $this->end_date->format('d.m.Y'),
        ];
    }
}
