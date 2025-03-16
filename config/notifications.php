<?php

declare(strict_types=1);

return [
    'strategies' => [
        'telegram' => App\Notification\Strategies\TelegramBotNotification::class,
        'email' => App\Notification\Strategies\EmailNotification::class,
    ],

    'page_visits' => [
        'enabled' => env('PAGE_VISITS_REPORT_ENABLED', true),
        'strategy' => env('PAGE_VISITS_REPORT_NOTIFICATIONS_STRATEGY', 'telegram'),
        'recipients' => explode(',', env('REPORT_PAGE_VISITS_RECIPIENTS', '')),
    ],
];
