<?php

namespace App\Filament\Resources\Teachers\Pages;

use App\Filament\Resources\Teachers\TeacherResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTeachers extends ListRecords
{
    protected static string $resource = TeacherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('export')
                ->label('Exportar')
                ->icon('heroicon-m-arrow-down-tray')
                ->color('gray')
                ->button(),
            CreateAction::make()
                ->label('Añadir Docente')
                ->icon('heroicon-m-user-plus')
                ->color('warning'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Resources\Teachers\Widgets\TeacherStatsOverview::class,
        ];
    }

    public function getTitle(): string
    {
        return 'Gestión de Docentes';
    }
}
