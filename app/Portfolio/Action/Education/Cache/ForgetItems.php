<?php

declare(strict_types=1);

namespace App\Portfolio\Action\Education\Cache;

class ForgetItems
{
    public function __invoke(): void
    {
        cache()->forget('educations');
    }
}
