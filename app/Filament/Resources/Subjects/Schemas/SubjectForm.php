<?php

namespace App\Filament\Resources\Subjects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SubjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre de la Materia')
                    ->required(),
                TextInput::make('description')
                    ->label('Descripción (ej. Cálculo Diferencial)'),
                TextInput::make('identifier')
                    ->label('Código (ej. MAT-101)'),
                TextInput::make('hours')
                    ->label('Horas Semanales')
                    ->numeric(),
                \Filament\Forms\Components\Select::make('modality')
                    ->label('Modalidad')
                    ->options([
                        'Presencial' => 'Presencial',
                        'Laboratorio' => 'Laboratorio',
                        'Virtual' => 'Virtual',
                    ]),
                TextInput::make('faculty')
                    ->label('Facultad'),
                \Filament\Forms\Components\Select::make('status')
                    ->label('Estado')
                    ->options([
                        'activa' => 'Activa',
                        'en revisión' => 'En Revisión',
                        'inactiva' => 'Inactiva',
                    ])
                    ->default('activa')
                    ->required(),
            ]);
    }
}
