<?php

declare(strict_types=1);

namespace App\Tables\Columns;

use Filament\Tables\Columns\Column;

class SimpleTableColumn extends Column
{
    protected string $view = 'tables.columns.simple-table-column';
}
