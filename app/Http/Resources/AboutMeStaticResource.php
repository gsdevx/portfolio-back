<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutMeStaticResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'avatar' => $this->avatar_url,
            'text' => $this->text,
        ];
    }
}
