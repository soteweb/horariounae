<?php

namespace App\Filament\Resources\Schedules\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ScheduleStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Clases Hoy', \App\Models\Schedule::count())
                ->description('+8% vs ayer')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('warning'),
            Stat::make('Aulas Ocupadas', '18/24')
                ->description('75%')
                ->descriptionIcon('heroicon-m-building-office')
                ->color('primary'),
            Stat::make('Docentes en Sesión', '15')
                ->description('En vivo')
                ->descriptionIcon('heroicon-m-user-circle')
                ->color('success'),
        ];
    }
}
