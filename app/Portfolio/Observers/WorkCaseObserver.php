<?php

declare(strict_types=1);

namespace App\Portfolio\Observers;

use App\Portfolio\Action\WorkCase\Cache\Forget;
use App\Portfolio\Models\WorkCase;

readonly class WorkCaseObserver
{
    public function __construct(private Forget $forgetCache) {}

    public function updated(WorkCase $workCase): void
    {
        logger()->info('updated');
        $this->forgetCache->workCase($workCase, true);
        $this->forgetCache->workCasesPaginated();
    }

    public function created(WorkCase $workCase): void
    {
        $this->forgetCache->workCasesPaginated();
    }

    public function deleted(WorkCase $workCase): void
    {
        $this->forgetCache->workCase($workCase, true);
        $this->forgetCache->workCasesPaginated();
    }

    public function restored(WorkCase $workCase): void
    {
        $this->forgetCache->workCase($workCase, true);
        $this->forgetCache->workCasesPaginated();
    }
}
