<?php

declare(strict_types=1);

namespace App\Domain\AboutMe\Models;

use Database\Factories\ToolFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Shared\Traits\ActiveOrderedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Domain\Shared\Contracts\ModelHasActiveOrderedScope;

/**
 * @property int $id
 * @property bool $is_active
 * @property string $title
 * @property int $order
 */
class Tool extends Model implements ModelHasActiveOrderedScope
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
}
