<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\AboutMe\Models\Education;
use App\Domain\AboutMe\Repositories\EducationRepositoryWithActiveOrderedRecords;

class EducationEloquentRepository implements EducationRepositoryWithActiveOrderedRecords
{
    public function findAllActiveOrdered(): \Countable
    {
        return Education::activeOrdered()->get();
    }
}
