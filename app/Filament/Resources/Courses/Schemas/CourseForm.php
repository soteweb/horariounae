<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Curso (ej. Primer Curso)')
                    ->required(),
                TextInput::make('period')
                    ->label('Semestre (ej. Primer Semestre, Segundo Semestre)'),
                TextInput::make('identifier')
                    ->label('Código Institucional (ej. CAE-XMM-20241)'),
                \Filament\Forms\Components\Select::make('career_id')
                    ->label('Carrera')
                    ->relationship('career', 'name')
                    ->searchable()
                    ->preload(),
                \Filament\Forms\Components\DatePicker::make('start_date')
                    ->label('Fecha de Inicio'),
                \Filament\Forms\Components\DatePicker::make('end_date')
                    ->label('Fecha de Fin'),
                \Filament\Forms\Components\Select::make('status')
                    ->label('Estado')
                    ->options([
                        'activo'      => 'Activo',
                        'planificado' => 'Planificado',
                        'finalizado'  => 'Finalizado',
                    ])
                    ->default('planificado')
                    ->required(),
            ]);
    }
}
