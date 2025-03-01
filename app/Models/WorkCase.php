<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\Models\HasActiveOrderedScope;
use App\Traits\Model\ActiveOrderedScope;
use App\Traits\Model\WithSlug;
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
class WorkCase extends Model implements HasMedia, HasActiveOrderedScope
{
    /** @use HasFactory<WorkCaseFactory> */
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;
    use ActiveOrderedScope;
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
}
