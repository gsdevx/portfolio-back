<?php

declare(strict_types=1);

namespace App\Reports\Console\Commands;

use App\Notification\Contracts\NotificationStrategy;
use App\Notification\DTO\MessageDTO;
use App\Notification\NotificationProcessor;
use App\Reports\Mappers\PageVisitsReportDTOMapper;
use App\Reports\PageVisitsDailyReport;
use Exception;
use Illuminate\Console\Command;

class SendPageVisitsDailyReport extends Command
{
    protected $signature = 'report:page_visits:daily';

    protected $description = 'Отправить отчет посещений сайта за день';

    public function handle(): void
    {
        try {
            $report = (new PageVisitsDailyReport)->makeReport();
            $message = (new PageVisitsReportDTOMapper($report))->toMessageDTO();
            $this->sendNotification($message);

            $this->info('Отчет отправлен');
        } catch (Exception $e) {
            logger()->error($e);
            $this->error($e->getMessage());
        }
    }

    private function getNotificationProcessor(): NotificationProcessor
    {
        return new NotificationProcessor(
            $this->getNotificationStrategy()
        );
    }

    private function getNotificationStrategy(): NotificationStrategy
    {
        $strategyAlias = config('notifications.page_visits.strategy');
        $strategyClass = config('notifications.strategies.' . $strategyAlias);

        return new $strategyClass;
    }

    private function getRecipients(): array
    {
        return config('notifications.page_visits.recipients');
    }

    private function sendNotification(MessageDTO $message): void
    {
        $processor = $this->getNotificationProcessor();
        $recipients = $this->getRecipients();

        foreach ($recipients as $recipient) {
            $processor->process($recipient, $message);
        }
    }
}
