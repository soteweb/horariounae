<?php

namespace App\Filament\Resources\Schedules\Pages;

use App\Filament\Resources\Schedules\ScheduleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSchedules extends ListRecords
{
    protected static string $resource = ScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('export')
                ->label('Exportar')
                ->icon('heroicon-m-arrow-down-tray')
                ->color('gray'),
            CreateAction::make()
                ->label('Crear Horario')
                ->color('warning'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Resources\Schedules\Widgets\ScheduleStatsOverview::class,
        ];
    }

    public function getTitle(): string
    {
        return 'Horarios Académicos';
    }

    public function getSubheading(): ?string
    {
        return 'Administra y organiza los horarios de clases, docentes y aulas para el periodo actual con precisión y eficiencia.';
    }
}
