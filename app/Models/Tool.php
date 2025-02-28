<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\Models\HasActiveOrderedScope;
use App\Traits\Model\ActiveOrderedScope;
use Database\Factories\ToolFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property bool $is_active
 * @property string $title
 * @property int $order
 */
class Tool extends Model implements HasActiveOrderedScope
{
    /** @use HasFactory<ToolFactory> */
    use HasFactory;
    use ActiveOrderedScope;

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
