<?php

namespace App\Filament\Pages;

use App\Settings\AboutMeSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageAboutMe extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    protected static string $settings = AboutMeSettings::class;

    protected static ?string $navigationLabel = 'Описание';

    protected static ?string $title = 'Редактирование описание';

    protected static ?string $navigationGroup = 'О себе';

    public function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\TextInput::make('avatar_url')
                    ->label('Ссылка на аватар'),
                Forms\Components\Textarea::make('text')
                    ->label('О себе')
                    ->rows(10),
            ]);
    }
}
