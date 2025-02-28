<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkPlaceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'companyName' => $this->company_name,
            'jobTitle' => $this->job_title,
            'description' => $this->description,
            'startDate' => $this->start_date?->format('d.m.Y'),
            'endDate' => $this->end_date?->format('d.m.Y'),
        ];
    }
}
