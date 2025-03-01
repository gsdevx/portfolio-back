<?php

declare(strict_types=1);

namespace App\Domain\AboutMe\Models;

use App\Domain\Shared\Contracts\ModelHasActiveOrderedScope;
use App\Domain\Shared\Traits\ActiveOrderedScope;
use App\Domain\Shared\Traits\DateSpanAttribute;
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
class Education extends Model implements ModelHasActiveOrderedScope
{
    /** @use HasFactory<EducationFactory> */
    use HasFactory;
    use DateSpanAttribute;
    use ActiveOrderedScope;

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
