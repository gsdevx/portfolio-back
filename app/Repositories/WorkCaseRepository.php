<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DTOs\WorkCaseDTO;
use App\Models\WorkCase;
use Illuminate\Contracts\Pagination\Paginator;

class WorkCaseRepository
{
    public function getActiveOrderedWithPagination(int $perPage = 12): Paginator
    {
        $paginator = WorkCase::activeOrdered()->paginate($perPage);
        $paginator->getCollection()
            ->transform(fn (WorkCase $workCase): WorkCaseDTO => $workCase->mapper()->toDTO());

        return $paginator;
    }

    public function findActiveBySlug(string $slug): ?WorkCase
    {
        return WorkCase::query()->firstWhere(['is_active' => true, 'slug' => $slug]);
    }
}
