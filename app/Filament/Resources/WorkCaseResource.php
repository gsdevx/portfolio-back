<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkCaseResource\Pages;
use App\Filament\Resources\WorkCaseResource\RelationManagers;
use App\Helpers\WorkCaseHelper;
use App\Models\WorkCase;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class WorkCaseResource extends Resource
{
    protected static ?string $model = WorkCase::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Контент';

    protected static ?string $label = 'Кейс';

    protected static ?string $pluralLabel = 'Кейсы ';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\Toggle::make('is_active')
                    ->label('Показывать')
                    ->required(),
                Forms\Components\SpatieMediaLibraryFileUpload::make('preview')
                    ->label('Превью')
                    ->collection('previews')
                    ->required(),
                Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                    ->label('Основное изображение')
                    ->collection('images')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->label('Название')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('summary')
                    ->label('Краткое описание')
                    ->rows(3),
                Forms\Components\Textarea::make('description')
                    ->label('Полное описание')
                    ->rows(10),
                Forms\Components\TagsInput::make('tags')
                    ->label('Теги'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('preview')
                    ->label('Првеью')
                    ->collection('previews'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Заголовок')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tags')
                    ->label('Теги')
                    ->searchable()
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Ссылка')
                    ->formatStateUsing(fn(WorkCase $record): string => WorkCaseHelper::resolveFrontendUri($record))
                    ->copyable()
                    ->copyableState(fn(WorkCase $record): string => WorkCaseHelper::resolveFrontendUri($record))
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Показывать'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order')
            ->reorderable('order');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWorkCases::route('/'),
            'create' => Pages\CreateWorkCase::route('/create'),
            'edit' => Pages\EditWorkCase::route('/{record}/edit'),
        ];
    }
}
