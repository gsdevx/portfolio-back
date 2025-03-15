<?php

declare(strict_types=1);

namespace App\Portfolio\Models;

use App\Portfolio\Mappers\ContactMapper;
use App\Shared\Contracts\Model\Mappable;
use App\Shared\Contracts\Model\ShouldHaveActiveOrderedScope;
use App\Shared\Traits\Models\ActiveOrderedScope;
use Database\Factories\ContactFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property bool $is_active
 * @property string $title
 * @property string|null $url
 * @property int|null $order
 */
class Contact extends Model implements Mappable, ShouldHaveActiveOrderedScope
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

    public function mapper(): ContactMapper
    {
        return new ContactMapper($this);
    }
}
