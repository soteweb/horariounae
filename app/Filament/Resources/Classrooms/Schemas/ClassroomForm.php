<?php

namespace App\Filament\Resources\Classrooms\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClassroomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre de la Sala')
                    ->required(),
                TextInput::make('location')
                    ->label('Ubicación (ej. Edificio Central - Piso 1)'),
                TextInput::make('capacity')
                    ->label('Capacidad')
                    ->numeric(),
                \Filament\Forms\Components\Select::make('status')
                    ->label('Estado')
                    ->options([
                        'disponible' => 'Disponible',
                        'ocupada' => 'Ocupada',
                        'mantenimiento' => 'Mantenimiento',
                    ])
                    ->default('disponible')
                    ->required(),
            ]);
    }
}
