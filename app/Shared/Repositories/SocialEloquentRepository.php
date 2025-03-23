<?php

declare(strict_types=1);

namespace App\Shared\Repositories;

use App\Portfolio\DTO\SocialDTO;
use App\Shared\Contracts\Repository\SocialRepository;
use App\Shared\Models\Social;
use Illuminate\Support\Collection;

class SocialEloquentRepository implements SocialRepository
{
    protected static string $modelClass = Social::class;

    /**
     * @return Collection<SocialDTO>
     */
    public function getActiveOrdered(): Collection
    {
        return map_model_collection(self::$modelClass::activeOrdered()->get(), 'toDTO');
    }
}
