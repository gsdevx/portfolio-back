<?php

namespace App\Models;

use App\Traits\Model\HasDateSpanAttribute;
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
class WorkPlace extends Model
{
    /** @use HasFactory<WorkPlaceFactory> */
    use HasFactory;
    use HasDateSpanAttribute;

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
