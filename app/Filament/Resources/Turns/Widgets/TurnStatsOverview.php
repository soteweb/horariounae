<?php

namespace App\Filament\Resources\Turns\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TurnStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $total = \App\Models\Turn::count();
        $activos = \App\Models\Turn::where('status', 'activo')->count();
        
        return [
            Stat::make('Total de Turnos', sprintf('%02d', $total))
                ->descriptionIcon('heroicon-m-squares-2x2')
                ->color('warning'),
            Stat::make('Turnos Activos', sprintf('%02d', $activos))
                ->descriptionIcon('heroicon-m-toggle-right')
                ->color('primary'),
            Stat::make('Promedio de Horas', '6.5h')
                ->descriptionIcon('heroicon-m-clock')
                ->color('gray'),
        ];
    }
}
