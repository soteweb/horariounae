<?php

namespace App\Filament\Resources\Subjects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SubjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('NOMBRE DE LA MATERIA')
                    ->badge()
                    ->color('warning') // similar to the "MA" badge in screenshot
                    ->description(fn (\App\Models\Subject $record): ?string => $record->description)
                    ->searchable(),
                TextColumn::make('identifier')
                    ->label('CÓDIGO')
                    ->searchable(),
                TextColumn::make('hours')
                    ->label('HORAS SEM.')
                    ->formatStateUsing(fn (\App\Models\Subject $record): string => $record->hours . 'h ' . $record->modality)
                    ->sortable(),
                TextColumn::make('faculty')
                    ->label('FACULTAD')
                    ->searchable(),
                TextColumn::make('status')
                    ->label('ESTADO')
                    ->badge()
                    ->color(fn (string $state): string => match (strtolower($state)) {
                        'activa' => 'success',
                        'en revisión' => 'warning',
                        'inactiva' => 'danger',
                        default => 'primary',
                    }),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('faculty')
                    ->label('Todas las Facultades')
                    ->options(fn () => \App\Models\Subject::whereNotNull('faculty')->pluck('faculty', 'faculty')->toArray()),
                \Filament\Tables\Filters\SelectFilter::make('type')
                    ->label('Tipo de Materia')
                    ->options([
                        'Obligatoria' => 'Obligatoria',
                        'Electiva' => 'Electiva',
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
