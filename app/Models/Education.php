<?php

namespace App\Models;

use App\Traits\Model\HasDateSpanAttribute;
use Carbon\Carbon;
use Database\Factories\EducationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property bool $is_active
 * @property string $institution_name
 * @property string $profession
 * @property string|null $description
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property int $order
 * @property-read string $date_span
 */
class Education extends Model
{
    /** @use HasFactory<EducationFactory> */
    use HasFactory;
    use HasDateSpanAttribute;

    public $timestamps = false;

    protected $fillable = [
        'is_active',
        'institution_name',
        'profession',
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
