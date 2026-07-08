<?php

namespace App\Filament\Resources\Careers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CareerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('identifier')
                    ->label('Identificador')
                    ->required(),
                TextInput::make('name')
                    ->label('Programa Académico')
                    ->required(),
                TextInput::make('description')
                    ->label('Descripción / Subtítulo'),
                \Filament\Forms\Components\Select::make('faculty_id')
                    ->relationship('faculty', 'name')
                    ->label('Facultad / Área'),
                TextInput::make('duration')
                    ->label('Duración'),
            ]);
    }
}
