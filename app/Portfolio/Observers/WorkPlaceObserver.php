<?php

declare(strict_types=1);

namespace App\Portfolio\Observers;

use App\Portfolio\Action\WorkPlace\Cache\ForgetItems;
use App\Portfolio\Models\WorkPlace;

readonly class WorkPlaceObserver
{
    public function __construct(
        private ForgetItems $forgetItems
    ) {}

    public function updated(WorkPlace $workPlace): void
    {
        $this->forgetItems->__invoke();
    }

    public function created(WorkPlace $workPlace): void
    {
        $this->forgetItems->__invoke();
    }

    public function deleted(WorkPlace $workPlace): void
    {
        $this->forgetItems->__invoke();
    }

    public function restored(WorkPlace $workPlace): void
    {
        $this->forgetItems->__invoke();
    }
}
