<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre del Docente (ej. Dr. Alejandro Vargas)')
                    ->required(),
                TextInput::make('identifier')
                    ->label('ID (ej. DOC-2024-001)'),
                TextInput::make('department')
                    ->label('Especialidad / Dpto.'),

                TextInput::make('phone')
                    ->label('Teléfono'),
                \Filament\Forms\Components\Select::make('status')
                    ->label('Estado')
                    ->options([
                        'activo' => 'Activo',
                        'en licencia' => 'En licencia',
                        'inactivo' => 'Inactivo',
                    ])
                    ->default('activo')
                    ->required(),

            ]);
    }
}
