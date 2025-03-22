<?php

declare(strict_types=1);

namespace App\Shared\Observers;

use App\Shared\Action\Contact\Cache\ForgetItems;
use App\Shared\Models\Contact;

readonly class ContactObserver
{
    public function __construct(
        private ForgetItems $forgetItems
    ) {}

    public function updated(Contact $contact): void
    {
        $this->forgetItems->__invoke();
    }

    public function created(Contact $contact): void
    {
        $this->forgetItems->__invoke();
    }

    public function deleted(Contact $contact): void
    {
        $this->forgetItems->__invoke();
    }

    public function restored(Contact $contact): void
    {
        $this->forgetItems->__invoke();
    }
}
