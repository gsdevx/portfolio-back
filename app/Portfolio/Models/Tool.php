<?php

declare(strict_types=1);

namespace App\Portfolio\Models;

use App\Portfolio\Mappers\ToolMapper;
use App\Shared\Contracts\Model\Mappable;
use App\Shared\Contracts\Model\ShouldHaveActiveOrderedScope;
use App\Shared\Traits\ActiveOrderedScope;
use Database\Factories\ToolFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property bool $is_active
 * @property string $title
 * @property int $order
 */
class Tool extends Model implements Mappable, ShouldHaveActiveOrderedScope
{
    use ActiveOrderedScope;

    /** @use HasFactory<ToolFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'is_active',
        'title',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'bool',
        ];
    }

    public function mapper(): ToolMapper
    {
        return new ToolMapper($this);
    }
}
