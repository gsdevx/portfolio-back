<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ToolResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
        ];
    }
}
