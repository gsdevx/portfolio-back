<?php

declare(strict_types=1);

namespace App\Notification;

use App\Notification\Contracts\NotificationStrategy;

class NotificationProcessor
{
    public function __construct(private NotificationStrategy $strategy) {}

    public function process(string $recipient, string $message): void
    {
        $this->strategy->notify($recipient, $message);
    }
}
