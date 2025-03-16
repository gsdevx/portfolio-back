<?php

declare(strict_types=1);

namespace App\Portfolio\Models;

use App\Portfolio\Mappers\EducationMapper;
use App\Shared\Contracts\Model\Mappable;
use App\Shared\Contracts\Model\ShouldHaveActiveOrderedScope;
use App\Shared\Traits\Models\ActiveOrderedScope;
use App\Shared\Traits\Models\DateSpanAttribute;
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
class Education extends Model implements Mappable, ShouldHaveActiveOrderedScope
{
    use ActiveOrderedScope;
    use DateSpanAttribute;

    /** @use HasFactory<EducationFactory> */
    use HasFactory;

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

    public function mapper(): EducationMapper
    {
        return new EducationMapper($this);
    }
}
