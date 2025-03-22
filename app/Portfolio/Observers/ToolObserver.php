<?php

declare(strict_types=1);

namespace App\Portfolio\Observers;

use App\Portfolio\Action\Tool\Cache\ForgetItems;
use App\Portfolio\Models\Tool;

readonly class ToolObserver
{
    public function __construct(
        private ForgetItems $forgetItems
    ) {}

    public function updated(Tool $tool): void
    {
        $this->forgetItems->__invoke();
    }

    public function created(Tool $tool): void
    {
        $this->forgetItems->__invoke();
    }

    public function deleted(Tool $tool): void
    {
        $this->forgetItems->__invoke();
    }

    public function restored(Tool $tool): void
    {
        $this->forgetItems->__invoke();
    }
}
