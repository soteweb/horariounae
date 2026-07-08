<?php

namespace App\Filament\Resources\Careers\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Tables\Table;

class TimeSlotsRelationManager extends RelationManager
{
    protected static string $relationship = 'timeSlots';

    protected static ?string $title = 'Bloques Horarios';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            TimePicker::make('start_time')
                ->label('Hora de inicio')
                ->required()
                ->seconds(false)
                ->displayFormat('H:i'),
            TimePicker::make('end_time')
                ->label('Hora de fin')
                ->required()
                ->seconds(false)
                ->displayFormat('H:i'),
            TextInput::make('sort_order')
                ->label('Orden')
                ->numeric()
                ->default(0)
                ->helperText('Número menor = aparece primero en el horario'),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('start_time')
            ->defaultSort('sort_order')
            ->columns([
                Tables\Columns\TextColumn::make('start_time')
                    ->label('Inicio')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('H:i'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_time')
                    ->label('Fin')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('H:i')),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Orden')
                    ->sortable(),
            ])
            ->headerActions([
                CreateAction::make()->label('Añadir Bloque'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}
