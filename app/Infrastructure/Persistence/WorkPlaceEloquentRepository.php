<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\AboutMe\Models\WorkPlace;
use App\Domain\AboutMe\Repositories\WorkPlaceRepositoryWithActiveOrderedRecords;

class WorkPlaceEloquentRepository implements WorkPlaceRepositoryWithActiveOrderedRecords
{
    public function findAllActiveOrdered(): \Countable
    {
        return WorkPlace::activeOrdered()->get();
    }
}
