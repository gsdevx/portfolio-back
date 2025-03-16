<?php

declare(strict_types=1);

namespace App\Notification\Strategies;

use App\Notification\Contracts\NotificationStrategy;
use App\Notification\DTO\MessageDTO;
use App\Notification\Mail\Notification;
use Illuminate\Support\Facades\Mail;

class EmailNotification implements NotificationStrategy
{
    public function notify(string $recipient, MessageDTO $message): void
    {
        try {
            Mail::to($recipient)->send(new Notification($message));
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
        }
    }
}
