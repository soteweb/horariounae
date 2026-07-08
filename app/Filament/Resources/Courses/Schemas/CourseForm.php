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
                    ->label('Nombre (ej. 2024 - Primer Semestre)')
                    ->required(),
                TextInput::make('identifier')
                    ->label('Código Institucional (ej. CAE-XMM-20241)'),
                \Filament\Forms\Components\Select::make('career_id')
                    ->label('Carrera')
                    ->relationship('career', 'name')
                    ->searchable()
                    ->preload(),
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
