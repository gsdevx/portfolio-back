<?php

declare(strict_types=1);

namespace App\Portfolio\Repositories;

use App\Portfolio\Contracts\Repository\WorkCaseRepository;
use App\Portfolio\DTO\WorkCaseCardDTO;
use App\Portfolio\DTO\WorkCaseDTO;
use App\Portfolio\Models\WorkCase;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class WorkCaseEloquentRepository implements WorkCaseRepository
{
    protected static string $modelClass = WorkCase::class;

    public function getActiveOrderedWithPagination(): Paginator
    {
        $perPage = config('pages.work-cases.per_page');
        $paginator = self::$modelClass::query()
            ->select(['id', 'is_active', 'slug', 'title', 'summary', 'tags', 'order'])
            ->activeOrdered()
            ->paginate($perPage);
        $paginator->getCollection()
            ->transform(fn (WorkCase $workCase): WorkCaseCardDTO => $workCase->mapper()->toCardDTO());

        return $paginator;
    }

    public function findActiveBySlug(string $slug): ?WorkCaseDTO
    {
        return self::$modelClass::query()
            ->select(['id', 'is_active', 'slug', 'title', 'description', 'tags'])
            ->firstWhere(['is_active' => true, 'slug' => $slug])
            ?->mapper()
            ->toDTO();
    }

    /**
     * Костыль, но по другому никак, whereJsonContains не хочет работать с кириллицей
     *
     * @return Collection<WorkCaseCardDTO>
     */
    public function findSimilar(WorkCaseDTO $workCase, int $limit = 6): Collection
    {
        $tags = $workCase->tags;
        $data = collect();

        self::$modelClass::activeOrdered()
            ->where('id', '!=', $workCase->id)
            ->each(static function (WorkCase $workCase) use ($data, $limit, $tags): void {
                if ($data->count() <= $limit && $workCase->hasAnyTags($tags)) {
                    $data->push($workCase->mapper()->toCardDTO());
                }
            });

        return $data;
    }

    public function getCount(bool $withTrashed = false): int
    {
        return self::$modelClass::query()
            ->select('id')
            ->when($withTrashed, static fn (Builder $query): Builder => $query->withTrashed())
            ->count();
    }
}
