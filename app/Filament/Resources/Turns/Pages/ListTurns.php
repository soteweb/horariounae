<?php

namespace App\Filament\Resources\Turns\Pages;

use App\Filament\Resources\Turns\TurnResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTurns extends ListRecords
{
    protected static string $resource = TurnResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('+ Nuevo Turno')
                ->color('warning'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Resources\Turns\Widgets\TurnStatsOverview::class,
        ];
    }

    public function getTitle(): string
    {
        return 'Gestión de Turnos';
    }

    public function getSubheading(): ?string
    {
        return 'Configura y administra los horarios rotativos de la institución.';
    }
}
