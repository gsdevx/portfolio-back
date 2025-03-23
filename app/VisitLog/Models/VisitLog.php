<?php

declare(strict_types=1);

namespace App\VisitLog\Models;

use Carbon\Carbon;
use Database\Factories\VisitLogFactory;
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
class VisitLog extends Model
{
    /** @use HasFactory<VisitLogFactory> */
    use HasFactory;

    protected $fillable = [
        'path',
        'ip',
        'user_agent',
    ];
}
