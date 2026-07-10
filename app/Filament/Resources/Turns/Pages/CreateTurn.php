<?php

namespace App\Filament\Resources\Turns\Pages;

use App\Filament\Resources\Turns\TurnResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTurn extends CreateRecord
{
    protected static string $resource = TurnResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Turno creado exitosamente';
    }
}
