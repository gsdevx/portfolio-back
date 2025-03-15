<?php

declare(strict_types=1);

namespace App\Notification\Strategies;

use App\Notification\Contracts\NotificationStrategy;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TelegramBotNotification implements NotificationStrategy
{
    private string $apiUrl = 'https://api.telegram.org/bot{token}/sendMessage';

    public function notify(string $recipient, string $message): void
    {
        try {
            Http::post($this->getApiUrl(), [
                'chat_id' => $recipient,
                'text' => $message,
                'parse_mode' => 'html',
            ]);
        } catch (\Exception $e) {
            logger()->error($e);
        }
    }

    private function getApiUrl(): string
    {
        return Str::replace('{token}', config('services.telegram.notifications.bot_token'), $this->apiUrl);
    }
}
