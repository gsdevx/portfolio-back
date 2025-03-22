<?php

declare(strict_types=1);

namespace App\Portfolio\Action\Tool\Cache;

class ForgetItems
{
    public function __invoke(): void
    {
        cache()->forget('tools');
    }
}
