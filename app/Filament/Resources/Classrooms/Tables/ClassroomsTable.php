<?php

namespace App\Filament\Resources\Classrooms\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ClassroomsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('NOMBRE DE LA SALA')
                    ->description(fn (\App\Models\Classroom $record): ?string => $record->location)
                    ->icon('heroicon-m-building-office')
                    ->searchable(),
                TextColumn::make('capacity')
                    ->label('CAPACIDAD')
                    ->formatStateUsing(fn (string $state): string => $state . ' personas')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('ESTADO')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'disponible' => 'success',
                        'ocupada' => 'warning',
                        'mantenimiento' => 'gray',
                        default => 'primary',
                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
