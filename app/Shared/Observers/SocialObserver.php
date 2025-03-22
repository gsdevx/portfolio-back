<?php

declare(strict_types=1);

namespace App\Shared\Observers;

use App\Shared\Action\Social\Cache\ForgetItems;
use App\Shared\Models\Social;

readonly class SocialObserver
{
    public function __construct(
        private ForgetItems $forgetItems
    ) {}

    public function updated(Social $social): void
    {
        $this->forgetItems->__invoke();
    }

    public function created(Social $social): void
    {
        $this->forgetItems->__invoke();
    }

    public function deleted(Social $social): void
    {
        $this->forgetItems->__invoke();
    }

    public function restored(Social $social): void
    {
        $this->forgetItems->__invoke();
    }
}
