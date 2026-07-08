<?php

namespace App\Filament\Resources\Schedules\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SchedulesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('career.name')
                    ->label('CARRERA')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('course.name')
                    ->label('CURSO')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('turn.name')
                    ->label('TURNO')
                    ->badge()
                    ->color('warning')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('subject.name')
                    ->label('MATERIA')
                    ->searchable(),
                TextColumn::make('teacher.name')
                    ->label('DOCENTE')
                    ->searchable(),
                TextColumn::make('classroom.name')
                    ->label('AULA')
                    ->searchable(),
                TextColumn::make('day_of_week')
                    ->label('DÍA')
                    ->searchable(),
                TextColumn::make('start_time')
                    ->label('INICIO')
                    ->time('H:i')
                    ->sortable(),
                TextColumn::make('end_time')
                    ->label('FIN')
                    ->time('H:i')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('ESTADO')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'en curso' => 'warning',
                        'programado' => 'gray',
                        'cancelado' => 'danger',
                        default => 'primary',
                    }),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('career_id')
                    ->label('Carrera')
                    ->relationship('career', 'name'),
                \Filament\Tables\Filters\SelectFilter::make('day_of_week')
                    ->label('Día')
                    ->options([
                        'Lunes' => 'Lunes',
                        'Martes' => 'Martes',
                        'Miércoles' => 'Miércoles',
                        'Jueves' => 'Jueves',
                        'Viernes' => 'Viernes',
                        'Sábado' => 'Sábado',
                        'Domingo' => 'Domingo',
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
