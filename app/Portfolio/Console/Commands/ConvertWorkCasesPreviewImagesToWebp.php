<?php

declare(strict_types=1);

namespace App\Portfolio\Console\Commands;

use App\Portfolio\Models\WorkCase;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class ConvertWorkCasesPreviewImagesToWebp extends Command
{
    protected $signature = 'portfolio:convert-work-cases-preview-images-to-webp';

    protected $description = 'Конвертировать превью кейсов в формат WEBP';

    public function handle()
    {
        $this->info('Запуск конвертации...');

        DB::beginTransaction();
        try {
            WorkCase::query()->chunk(100, function (Collection $workCases) {
                $workCases->each(function (WorkCase $workCase): void {
                    $this->info('Проверка возможности конвертации для кейса ' . $workCase->title);
                    $preview = $workCase->getFirstMedia('previews');

                    if ($preview && ! $preview->hasGeneratedConversion('preview-thumb')) {
                        $preview->markAsConversionGenerated('preview-thumb');

                        Artisan::call('media-library:regenerate --ids=' . $preview->id);
                        $this->info('Превью конвертировано в формат WEBP');
                    } else {
                        $this->info('Превью отсутствует либо было уже конвертировано');
                    }
                });
            });
            DB::commit();
            $this->info('Конвертация окончена');
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error($e->getMessage());
            $this->error($e->getMessage());
        }
    }
}
