<?php

declare(strict_types=1);

namespace App\Portfolio\Repositories;

use App\Portfolio\DTO\WorkCaseDTO;
use App\Portfolio\Models\WorkCase;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

class WorkCaseRepository
{
    protected static string $modelClass = WorkCase::class;

    public function getActiveOrderedWithPagination(int $perPage = 12): Paginator
    {
        $paginator = self::$modelClass::activeOrdered()->paginate($perPage);
        $paginator->getCollection()
            ->transform(fn (WorkCase $workCase): WorkCaseDTO => $workCase->mapper()->toDTO());

        return $paginator;
    }

    public function findActiveBySlug(string $slug): ?WorkCase
    {
        return self::$modelClass::query()->firstWhere(['is_active' => true, 'slug' => $slug]);
    }

    /**
     * Костыль, но по другому никак, whereJsonContains не хочет работать с кириллицей
     *
     * @return Collection<WorkCaseDTO>
     */
    public function findSimilar(WorkCaseDTO $workCase, int $limit = 6): Collection
    {
        $tags = $workCase->tags;
        $data = collect();

        self::$modelClass::activeOrdered()
            ->where('id', '!=', $workCase->id)
            ->each(static function (WorkCase $workCase) use ($data, $limit, $tags): void {
                if ($data->count() <= $limit && $workCase->hasAnyTags($tags)) {
                    $data->push($workCase->mapper()->toDTO());
                }
            });

        return $data;
    }
}
