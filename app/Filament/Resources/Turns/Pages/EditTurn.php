<?php

namespace App\Filament\Resources\Turns\Pages;

use App\Filament\Resources\Turns\TurnResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTurn extends EditRecord
{
    protected static string $resource = TurnResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
