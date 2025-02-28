<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\Models\HasActiveOrderedScope;
use App\Traits\Model\ActiveOrderedScope;
use App\Traits\Model\DateSpanAttribute;
use Carbon\Carbon;
use Database\Factories\WorkPlaceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property bool $is_active
 * @property string $company_name
 * @property string $job_title
 * @property string|null $description
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property int $order
 * @property-read string $date_span
 */
class WorkPlace extends Model implements HasActiveOrderedScope
{
    /** @use HasFactory<WorkPlaceFactory> */
    use HasFactory;
    use DateSpanAttribute;
    use ActiveOrderedScope;

    public $timestamps = false;

    protected $fillable = [
        'is_active',
        'company_name',
        'job_title',
        'description',
        'start_date',
        'end_date',
        'order',
    ];

    public function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }
}
