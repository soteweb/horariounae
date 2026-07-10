<?php

namespace App\Filament\Resources\Courses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CoursesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('SEMESTRE / CURSO')
                    ->badge()
                    ->color('warning') // similar to the "24-I" in the screenshot
                    ->description(fn (\App\Models\Course $record): ?string => trim($record->period . "\n" . $record->identifier))
                    ->searchable(),
                TextColumn::make('career.name')
                    ->label('CARRERA')
                    ->default('-')
                    ->searchable(),
                TextColumn::make('start_date')
                    ->label('FECHA INICIO')
                    ->date('d M, Y')
                    ->placeholder('-')
                    ->sortable(),
                TextColumn::make('end_date')
                    ->label('FECHA FIN')
                    ->date('d M, Y')
                    ->placeholder('-')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('ESTADO')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'activo' => 'success',
                        'planificado' => 'gray',
                        'finalizado' => 'dark',
                        default => 'primary',
                    }),
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
