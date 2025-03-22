<?php

declare(strict_types=1);

namespace App\Portfolio\Observers;

use App\Portfolio\Action\WorkCase\Cache\ForgetItem;
use App\Portfolio\Action\WorkCase\Cache\ForgetPaginated;
use App\Portfolio\Models\WorkCase;

readonly class WorkCaseObserver
{
    public function __construct(
        private ForgetPaginated $forgetPaginated,
        private ForgetItem $forgetItem,
    ) {}

    public function updated(WorkCase $workCase): void
    {
        $this->forgetItem->__invoke($workCase, true);
        $this->forgetPaginated->__invoke();
    }

    public function created(WorkCase $workCase): void
    {
        $this->forgetPaginated->__invoke();
    }

    public function deleted(WorkCase $workCase): void
    {
        $this->forgetItem->__invoke($workCase, true);
        $this->forgetPaginated->__invoke();
    }

    public function restored(WorkCase $workCase): void
    {
        $this->forgetItem->__invoke($workCase, true);
        $this->forgetPaginated->__invoke();
    }
}
