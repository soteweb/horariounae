<?php

namespace App\Filament\Resources\Careers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CareersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('identifier')
                    ->label('IDENTIFICADOR')
                    ->badge()
                    ->color('warning')
                    ->searchable(),
                TextColumn::make('name')
                    ->label('PROGRAMA ACADÉMICO')
                    ->description(fn (\App\Models\Career $record): ?string => $record->description)
                    ->icon('heroicon-m-building-library')
                    ->searchable(),
                TextColumn::make('faculty.name')
                    ->label('FACULTAD / ÁREA')
                    ->searchable(),
                TextColumn::make('duration')
                    ->label('DURACIÓN')
                    ->searchable(),
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
