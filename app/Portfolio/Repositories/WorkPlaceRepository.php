<?php

declare(strict_types=1);

namespace App\Portfolio\Repositories;

use App\Portfolio\DTO\WorkPlaceDTO;
use App\Portfolio\Models\WorkPlace;
use Illuminate\Support\Collection;

class WorkPlaceRepository
{
    protected static string $modelClass = WorkPlace::class;

    /**
     * @return Collection<WorkPlaceDTO>
     */
    public function getActiveOrdered(): Collection
    {
        return map_model_collection(self::$modelClass::activeOrdered()->get(), 'toDTO');
    }
}
