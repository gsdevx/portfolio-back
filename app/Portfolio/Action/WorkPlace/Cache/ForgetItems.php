<?php

declare(strict_types=1);

namespace App\Portfolio\Action\WorkPlace\Cache;

class ForgetItems
{
    public function __invoke(): void
    {
        cache()->forget('work_places');
    }
}
