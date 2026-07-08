<?php

namespace App\Filament\Resources\Turns\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TurnForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre del Turno (ej. Mañana)')
                    ->required(),
                \Filament\Forms\Components\TimePicker::make('start_time')
                    ->label('Hora de Inicio')
                    ->seconds(false),
                \Filament\Forms\Components\TimePicker::make('end_time')
                    ->label('Hora de Fin')
                    ->seconds(false),
                \Filament\Forms\Components\Select::make('status')
                    ->label('Estado')
                    ->options([
                        'activo' => 'Activo',
                        'inactivo' => 'Inactivo',
                    ])
                    ->default('activo')
                    ->required(),
            ]);
    }
}
