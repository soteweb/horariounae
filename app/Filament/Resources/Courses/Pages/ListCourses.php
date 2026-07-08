<?php

namespace App\Filament\Resources\Courses\Pages;

use App\Filament\Resources\Courses\CourseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCourses extends ListRecords
{
    protected static string $resource = CourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('export')
                ->label('Exportar')
                ->icon('heroicon-m-arrow-down-tray')
                ->color('gray'),
            CreateAction::make()
                ->label('Crear Semestre')
                ->color('warning'),
        ];
    }

    public function getTitle(): string
    {
        return 'Gestión de Semestres';
    }

    public function getSubheading(): ?string
    {
        return 'Monitorea y organiza los periodos académicos actuales y futuros de la institución.';
    }
}
