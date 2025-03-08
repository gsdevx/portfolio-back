<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Models\WorkCase;
use App\Tables as AppTables;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class WorkCaseResource extends Resource
{
    protected static ?string $model = WorkCase::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationGroup = 'Контент';

    protected static ?string $label = 'Кейс';

    protected static ?string $pluralLabel = 'Кейсы';

    protected static ?string $recordRouteKeyName = 'slug';

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
                    ->maxSize(10240)
                    ->required(),
                Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                    ->label('Основное изображение')
                    ->collection('images')
                    ->maxSize(10240)
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->label('Название')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('summary')
                    ->label('Краткое описание')
                    ->rows(3),
                Forms\Components\RichEditor::make('description')
                    ->label('Полное описание')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'strike',
                        'underline',
                        'link',
                        'orderedList',
                        'bulletList',
                        'h3',
                        'redo',
                        'undo',
                    ]),
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
                    ->formatStateUsing(fn (WorkCase $record): string => 'Копировать')
                    ->copyable()
                    ->copyableState(fn (WorkCase $record): string => route('work-cases.show', ['slug' => $record->slug]))
                    ->searchable(),
                AppTables\Columns\SimpleTableColumn::make('views_data_set')
                    ->label('Просмотры')
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Показывать'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->url(static fn ($record): string => route('filament.admin.resources.work-cases.edit', ['record' => $record->slug])),
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
            'index' => \App\Filament\Resources\WorkCaseResource\Pages\ListWorkCases::route('/'),
            'create' => \App\Filament\Resources\WorkCaseResource\Pages\CreateWorkCase::route('/create'),
            'edit' => \App\Filament\Resources\WorkCaseResource\Pages\EditWorkCase::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            WorkCaseResource\Widgets\WorkCasesPageVisitInfo::class,
        ];
    }
}
