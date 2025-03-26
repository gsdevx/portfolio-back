<?php

declare(strict_types=1);

namespace App\Portfolio\Listeners;

use App\Portfolio\Action\WorkCase\Cache\ForgetItem;
use App\Portfolio\Action\WorkCase\Cache\ForgetPaginated;
use App\Portfolio\Models\WorkCase;
use Spatie\MediaLibrary\MediaCollections\Events\MediaHasBeenAddedEvent;

readonly class MediaLogger
{
    public function __construct(
        private ForgetPaginated $forgetPaginated,
        private ForgetItem $forgetItem,
    ) {}

    public function handle(MediaHasBeenAddedEvent $event): void
    {
        $media = $event->media;
        /** @var class-string $modelClass */
        $modelClass = $media->model_type;
        $model = $modelClass::find($media->model_id);

        if ($modelClass === WorkCase::class) {
            $this->forgetPaginated->__invoke();
            $this->forgetItem->__invoke($model);
        }
    }
}
