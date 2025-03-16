<?php

declare(strict_types=1);

namespace App\Notification\Contracts;

use App\Notification\DTO\MessageDTO;

interface NotificationStrategy
{
    public function notify(string $recipient, MessageDTO $message): void;
}
