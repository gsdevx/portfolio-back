<?php

declare(strict_types=1);

namespace App\Domain\Footer\Models;

use Spatie\MediaLibrary\HasMedia;
use Database\Factories\SocialFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Domain\Shared\Traits\ActiveOrderedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Domain\Shared\Contracts\ModelHasActiveOrderedScope;

/**
 * @property int $id
 * @property bool $is_active
 * @property string $title
 * @property string|null $url
 * @property int|null $order
 */
class Social extends Model implements HasMedia, ModelHasActiveOrderedScope
{
    use ActiveOrderedScope;

    /** @use HasFactory<SocialFactory> */
    use HasFactory;

    use InteractsWithMedia;

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
