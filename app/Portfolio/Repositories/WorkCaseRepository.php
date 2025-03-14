<?php

declare(strict_types=1);

namespace App\Portfolio\Repositories;

use App\Portfolio\DTO\WorkCaseDTO;
use App\Portfolio\Models\WorkCase;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

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

    /**
     * Костыль, но по другому никак, whereJsonContains не хочет работать с кириллицей
     *
     * @return Collection<WorkCaseDTO>
     */
    public function findSimilar(WorkCaseDTO $workCase, int $limit = 6): Collection
    {
        $tags = $workCase->tags;

        return WorkCase::activeOrdered()
            ->where('id', '!=', $workCase->id)
            ->take($limit)
            ->get()
            ->filter(static fn (WorkCase $workCase): bool => $workCase->hasAnyTags($tags))
            ->map(static fn (WorkCase $workCase): WorkCaseDTO => $workCase->mapper()->toDTO());
    }
}
