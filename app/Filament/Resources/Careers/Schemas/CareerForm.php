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
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
