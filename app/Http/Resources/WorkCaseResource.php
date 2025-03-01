<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkCaseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'slug' => $this->slug,
            'preview' => $this->getFirstMediaUrl('previews'),
            'image' => $this->getFirstMediaUrl('images'),
            'title' => $this->title,
            'summary' => $this->summary,
            'description' => $this->description,
            'tags' => $this->tags,
        ];
    }
}
