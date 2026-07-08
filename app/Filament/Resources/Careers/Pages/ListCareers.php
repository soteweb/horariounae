<?php

namespace App\Filament\Resources\Careers\Pages;

use App\Filament\Resources\Careers\CareerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCareers extends ListRecords
{
    protected static string $resource = CareerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nueva Carrera')
                ->color('warning'), // Using warning to approximate the yellow button in the mockup
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Resources\Careers\Widgets\CareerStatsOverview::class,
        ];
    }

    public function getTitle(): string
    {
        return 'Gestión Académica';
    }

    public function getSubheading(): ?string
    {
        return 'Configura y administra los programas de estudio vigentes para este periodo institucional.';
    }
}
