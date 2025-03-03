<?php

declare(strict_types=1);

namespace App\Domain\Footer\Models;

use Database\Factories\ContactFactory;
use Illuminate\Database\Eloquent\Model;
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
class Contact extends Model implements ModelHasActiveOrderedScope
{
    use ActiveOrderedScope;

    /** @use HasFactory<ContactFactory> */
    use HasFactory;

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
