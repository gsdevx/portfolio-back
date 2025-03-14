<?php

declare(strict_types=1);

namespace App\Shared\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait WithSlug
{
    protected static string $slugColumn = 'slug';

    protected static string $fromColumn = 'title';

    protected static function bootWithSlug(): void
    {
        static::creating(function (Model $model) {
            $model->{self::$slugColumn} = self::generateSlug($model);
        });
    }

    protected static function generateSlug(Model $model): string
    {
        $i = 0;
        $slug = Str::slug($model->{static::$fromColumn});

        while ($model::query()->where(self::$slugColumn, $slug)->exists()) {
            $slug .= '-'.++$i;
        }

        return $slug;
    }
}
