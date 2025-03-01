<?php

declare(strict_types=1);

namespace App\Domain\Footer\Models;

use App\Domain\Shared\Contracts\ModelHasActiveOrderedScope;
use App\Domain\Shared\Traits\ActiveOrderedScope;
use Database\Factories\SocialFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property int $id
 * @property bool $is_active
 * @property string $title
 * @property string|null $url
 * @property int|null $order
 */
class Social extends Model implements HasMedia, ModelHasActiveOrderedScope
{
    /** @use HasFactory<SocialFactory> */
    use HasFactory;
    use InteractsWithMedia;
    use ActiveOrderedScope;

    public $timestamps = false;

    protected $fillable = [
        'is_active',
        'title',
        'url',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
