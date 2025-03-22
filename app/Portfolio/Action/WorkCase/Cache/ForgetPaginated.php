<?php

declare(strict_types=1);

namespace App\Portfolio\Action\WorkCase\Cache;

use App\Portfolio\Repositories\WorkCaseRepository;

class ForgetPaginated
{
    /**
     * Костыль, потому, что на сервер нельзя поставить Redis и пользоваться тегами
     */
    public function __invoke(): void
    {
        $count = (new WorkCaseRepository)->getCount();
        $perPage = config('pages.work-cases.per_page');
        $totalPages = ceil($count / $perPage);

        for ($i = 1; $i <= $totalPages; $i++) {
            cache()->forget('work-cases:paginated:' . $i);
        }
    }
}
