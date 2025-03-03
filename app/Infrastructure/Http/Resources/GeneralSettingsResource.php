<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneralSettingsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'siteEnabled' => (bool) $this->site_enabled,
        ];
    }
}
