<?php

declare(strict_types=1);

namespace App\Domain\Statistics\Models;

use Carbon\Carbon;
use App\Domain\Statistics\Casts\IPCast;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\PageVisitFactory;
use App\Domain\Statistics\Casts\PathCast;
use App\Domain\Statistics\Casts\UserAgentCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    protected function casts(): array
    {
        return [
            'path' => PathCast::class,
            'ip' => IpCast::class,
            'user_agent' => UserAgentCast::class,
        ];
    }
}
