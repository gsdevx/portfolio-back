<?php

declare(strict_types=1);

namespace App\Portfolio\Observers;

use App\Portfolio\Action\Education\Cache\ForgetItems;
use App\Portfolio\Models\Education;

readonly class EducationObserver
{
    public function __construct(
        private ForgetItems $forgetItems
    ) {}

    public function updated(Education $education): void
    {
        $this->forgetItems->__invoke();
    }

    public function created(Education $education): void
    {
        $this->forgetItems->__invoke();
    }

    public function deleted(Education $education): void
    {
        $this->forgetItems->__invoke();
    }

    public function restored(Education $education): void
    {
        $this->forgetItems->__invoke();
    }
}
