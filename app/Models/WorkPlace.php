<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\Model\Mappable;
use App\Contracts\Model\ShouldHaveActiveOrderedScope;
use App\Mappers\WorkPlaceMapper;
use App\Traits\ActiveOrderedScope;
use App\Traits\DateSpanAttribute;
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
class WorkPlace extends Model implements Mappable, ShouldHaveActiveOrderedScope
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

    public function mapper(): WorkPlaceMapper
    {
        return new WorkPlaceMapper($this);
    }
}
