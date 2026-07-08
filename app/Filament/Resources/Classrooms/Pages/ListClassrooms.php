<?php

namespace App\Filament\Resources\Classrooms\Pages;

use App\Filament\Resources\Classrooms\ClassroomResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClassrooms extends ListRecords
{
    protected static string $resource = ClassroomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Crear Sala')
                ->color('warning'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Resources\Classrooms\Widgets\ClassroomStatsOverview::class,
        ];
    }

    public function getTitle(): string
    {
        return 'Gestión de Salas';
    }

    public function getSubheading(): ?string
    {
        return 'Administra y visualiza la disponibilidad de espacios físicos para actividades académicas.';
    }
}
