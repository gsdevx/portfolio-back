<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageGeneral extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $navigationLabel = 'Сайт';

    protected static ?string $title = 'Редактирование настройки';

    protected static ?string $navigationGroup = 'Настройки';

    protected static ?int $navigationSort = 9999;

    public function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\Toggle::make('site_enabled')
                    ->label('Сайт включен'),
            ]);
    }
}
