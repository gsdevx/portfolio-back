<?php

declare(strict_types=1);

namespace App\Portfolio\Repositories;

use App\Portfolio\Contracts\Repository\EducationRepository;
use App\Portfolio\DTO\EducationDTO;
use App\Portfolio\Models\Education;
use Illuminate\Support\Collection;

class EducationEloquentRepository implements EducationRepository
{
    protected static string $modelClass = Education::class;

    /**
     * @return Collection<EducationDTO>
     */
    public function getActiveOrdered(): Collection
    {
        return map_model_collection(self::$modelClass::activeOrdered()->get(), 'toDTO');
    }
}
