<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FooterResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'contacts' => ContactResource::collection($this->contacts),
            'socials' => SocialResource::collection($this->socials)
        ];
    }
}
