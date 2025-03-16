<?php

declare(strict_types=1);

namespace App\Notification;

use App\Notification\Contracts\NotificationStrategy;
use App\Notification\DTO\MessageDTO;

readonly class NotificationProcessor
{
    public function __construct(private NotificationStrategy $strategy) {}

    public function process(string $recipient, MessageDTO $message): void
    {
        $this->strategy->notify($recipient, $message);
    }
}
