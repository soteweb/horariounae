<?php

namespace App\Filament\Resources\Subjects\Pages;

use App\Filament\Resources\Subjects\SubjectResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSubjects extends ListRecords
{
    protected static string $resource = SubjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('+ Nuevo Registro')
                ->color('warning'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Resources\Subjects\Widgets\SubjectStatsOverview::class,
        ];
    }

    public function getTitle(): string
    {
        return 'Gestión de Materias';
    }

    public function getSubheading(): ?string
    {
        return 'Administra el catálogo de asignaturas, créditos y requisitos académicos. Asegura la integridad del currículo estudiantil.';
    }
}
