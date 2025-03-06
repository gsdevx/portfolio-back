<?php

declare(strict_types=1);

namespace App\Domain\AboutMe\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\WorkPlaceFactory;
use App\Domain\Shared\Traits\DateSpanAttribute;
use App\Domain\Shared\Traits\ActiveOrderedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Domain\Shared\Contracts\ModelHasActiveOrderedScope;

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
class WorkPlace extends Model implements ModelHasActiveOrderedScope
{
    use ActiveOrderedScope;
    use DateSpanAttribute;

    /** @use HasFactory<WorkPlaceFactory> */
    use HasFactory;

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
