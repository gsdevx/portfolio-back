<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\Model\Mappable;
use App\Contracts\Model\ShouldHaveActiveOrderedScope;
use App\Mappers\WorkCaseMapper;
use App\Traits\ActiveOrderedScope;
use App\Traits\WithSlug;
use Carbon\Carbon;
use Database\Factories\WorkCaseFactory;
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
}
