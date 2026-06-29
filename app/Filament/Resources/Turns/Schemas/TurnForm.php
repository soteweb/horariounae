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
                    ->required(),
            ]);
    }
}
