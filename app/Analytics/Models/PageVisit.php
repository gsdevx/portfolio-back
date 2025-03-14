<?php

declare(strict_types=1);

namespace App\Analytics\Models;

use Carbon\Carbon;
use Database\Factories\PageVisitFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $path
 * @property string $ip
 * @property string $user_agent
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class PageVisit extends Model
{
    /** @use HasFactory<PageVisitFactory> */
    use HasFactory;

    protected $fillable = [
        'path',
        'ip',
        'user_agent',
    ];
}
