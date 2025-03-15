<?php

declare(strict_types=1);

return [
    'page_visits' => [
        'strategy' => App\Notification\Strategies\TelegramBotNotification::class,
        'recipients' => explode(',', env('REPORT_PAGE_VISITS_RECIPIENTS', '')),
    ],
];
