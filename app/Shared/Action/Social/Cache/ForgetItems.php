<?php

declare(strict_types=1);

namespace App\Shared\Action\Social\Cache;

class ForgetItems
{
    public function __invoke(): void
    {
        cache()->forget('socials');
    }
}
