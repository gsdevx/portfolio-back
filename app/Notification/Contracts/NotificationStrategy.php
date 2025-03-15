<?php

declare(strict_types=1);

namespace App\Notification\Contracts;

interface NotificationStrategy
{
    public function notify(string $recipient, string $message): void;
}
