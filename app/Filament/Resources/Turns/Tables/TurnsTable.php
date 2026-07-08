<?php

namespace App\Filament\Resources\Turns\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TurnsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('NOMBRE DEL TURNO')
                    ->badge()
                    ->color('warning') // similar to the "M" badge in screenshot
                    ->weight('bold')
                    ->formatStateUsing(fn (string $state): string => substr($state, 0, 1) . '   ' . $state)
                    ->searchable(),
                TextColumn::make('start_time')
                    ->label('HORA INICIO')
                    ->time('h:i A')
                    ->sortable(),
                TextColumn::make('end_time')
                    ->label('HORA FIN')
                    ->time('h:i A')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('ESTADO')
                    ->badge()
                    ->color(fn (string $state): string => match (strtolower($state)) {
                        'activo' => 'success',
                        'inactivo' => 'danger',
                        default => 'primary',
                    }),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('status')
                    ->label('Estado')
                    ->options([
                        'activo' => 'Activo',
                        'inactivo' => 'Inactivo',
                    ]),
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
