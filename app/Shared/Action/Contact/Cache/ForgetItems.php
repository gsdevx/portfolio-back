<?php

declare(strict_types=1);

namespace App\Shared\Action\Contact\Cache;

class ForgetItems
{
    public function __invoke(): void
    {
        cache()->forget('contacts');
    }
}
