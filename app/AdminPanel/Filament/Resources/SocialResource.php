<?php

declare(strict_types=1);

namespace App\AdminPanel\Filament\Resources;

use App\Portfolio\Models\Social;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SocialResource extends Resource
{
    protected static ?string $model = Social::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationGroup = 'Подвал';

    protected static ?int $navigationSort = 999;

    protected static ?string $label = 'Соц. сеть';

    protected static ?string $pluralLabel = 'Соц. сети';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\Toggle::make('is_active')
                    ->label('Показывать'),
                Forms\Components\SpatieMediaLibraryFileUpload::make('icons')
                    ->label('Иконка')
                    ->collection('icons'),
                Forms\Components\TextInput::make('title')
                    ->label('Заголовок')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->label('Ссылка')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('icon')
                    ->label('Иконка')
                    ->collection('icons'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Заголовок')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->label('Ссылка')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Показывать')
                    ->boolean(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order')
            ->reorderable('order');
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\AdminPanel\Filament\Resources\SocialResource\Pages\ManageSocials::route('/'),
        ];
    }
}
