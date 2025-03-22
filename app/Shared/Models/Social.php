<?php

declare(strict_types=1);

namespace App\Shared\Models;

use App\Portfolio\Mappers\SocialMapper;
use App\Shared\Contracts\Model\Mappable;
use App\Shared\Contracts\Model\ShouldHaveActiveOrderedScope;
use App\Shared\Traits\Models\ActiveOrderedScope;
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
class Social extends Model implements HasMedia, Mappable, ShouldHaveActiveOrderedScope
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

    public function mapper(): SocialMapper
    {
        return new SOcialMapper($this);
    }
}
