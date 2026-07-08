<?php

namespace App\Filament\Resources\Classrooms\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ClassroomStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Resumen de Capacidad', \App\Models\Classroom::count())
                ->description('Total de Salas')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('success'),
        ];
    }
}
