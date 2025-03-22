<?php

declare(strict_types=1);

namespace App\Portfolio\Action\WorkCase\Cache;

use App\Portfolio\Models\WorkCase;
use App\Portfolio\Repositories\WorkCaseRepository;

class Forget
{
    /**
     * Костыль, потому, что на сервер нельзя поставить Redis и пользоваться тегами
     */
    public function workCasesPaginated(): void
    {
        $count = (new WorkCaseRepository)->getCount();
        $perPage = config('pages.work-cases.per_page');
        $totalPages = ceil($count / $perPage);

        for ($i = 1; $i <= $totalPages; $i++) {
            cache()->forget('work-cases:paginated:' . $i);
        }
    }

    public function workCase(WorkCase $workCase, bool $withSimilar = false): void
    {
        cache()->forget('work-case:' . $workCase->slug);

        if ($withSimilar) {
            $this->similar($workCase);
        }
    }

    public function similar(WorkCase $workCase): void
    {
        cache()->forget('work-case:' . $workCase->slug . ':similar');
    }
}
