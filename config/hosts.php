<?php

declare(strict_types=1);

return [
    'allowed' => explode(',', env('TRUSTED_HOSTS')),
];
