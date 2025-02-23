<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationResource\Pages;
use App\Filament\Resources\EducationResource\RelationManagers;
use App\Models\Education;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EducationResource extends Resource
{
    protected static ?string $model = Education::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'О себе';

    protected static ?int $navigationSort = 498;

    protected static ?string $label = 'Образование';

    protected static ?string $pluralLabel = 'Образование';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\Toggle::make('is_active')
                    ->label('Показывать'),
                Forms\Components\TextInput::make('institution_name')
                    ->label('Название заведения')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('profession')
                    ->label('Профессия')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Описание')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DatePicker::make('start_date')
                    ->label('Дата начала')
                    ->required()
                    ->native(0),
                Forms\Components\DatePicker::make('end_date')
                    ->label('Дата окончания')
                    ->required()
                    ->native(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('institution_name')
                    ->label('Название заведения')
                    ->searchable(),
                Tables\Columns\TextColumn::make('profession')
                    ->label('Профессия')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_span')
                    ->label('Годы')
                    ->sortable(),
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
            'index' => Pages\ManageEducation::route('/'),
        ];
    }
}
