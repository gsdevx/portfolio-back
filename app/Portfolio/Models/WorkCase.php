<?php

declare(strict_types=1);

namespace App\Portfolio\Models;

use App\Analytics\WorkCasesPageVisits as VisitAnalytics;
use App\Portfolio\Mappers\WorkCaseMapper;
use App\Shared\Contracts\Model\Mappable;
use App\Shared\Contracts\Model\ShouldHaveActiveOrderedScope;
use App\Shared\Traits\ActiveOrderedScope;
use App\Shared\Traits\WithSlug;
use Carbon\Carbon;
use Database\Factories\WorkCaseFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property int $id
 * @property bool $is_active
 * @property string $title
 * @property string $slug
 * @property string|null $summary
 * @property string|null $description
 * @property array|null $tags
 * @property int|null $order
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read int $today_views
 * @property-read int $today_unique_views
 * @property-read int $all_time_views
 * @property-read int $all_time_unique_views
 * @property-read array<int, string|int>[] $views_data_set
 */
class WorkCase extends Model implements HasMedia, Mappable, ShouldHaveActiveOrderedScope
{
    use ActiveOrderedScope;

    /** @use HasFactory<WorkCaseFactory> */
    use HasFactory;

    use InteractsWithMedia;
    use SoftDeletes;
    use WithSlug;

    protected $fillable = [
        'is_active',
        'slug',
        'title',
        'summary',
        'description',
        'tags',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'tags' => 'array',
        ];
    }

    public function mapper(): WorkCaseMapper
    {
        return new WorkCaseMapper($this);
    }

    public function getTodayViewsCount(bool $unique = false): int
    {
        $today = today();
        $startOfDay = $today->clone()->startOfDay();
        $endOfDay = $today->clone()->endOfDay();

        return VisitAnalytics::getViewsCount(concrete: $this, unique: $unique, fromDate: $startOfDay, toDate: $endOfDay);
    }

    public function getViewsCount(bool $unique = false): int
    {
        return VisitAnalytics::getViewsCount(concrete: $this, unique: $unique);
    }

    public function viewsDataSet(): Attribute
    {
        return Attribute::get(function (): array {
            return [
                ['Сегодня', $this->getTodayViewsCount()],
                ['Сегодня (У)', $this->getTodayViewsCount(true)],
                ['Все время', $this->getViewsCount()],
                ['Все время (У)', $this->getViewsCount(true)],
            ];
        });
    }
}
