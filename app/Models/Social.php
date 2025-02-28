<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\Models\HasActiveOrderedScope;
use App\Traits\Model\ActiveOrderedScope;
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
class Social extends Model implements HasMedia, HasActiveOrderedScope
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
