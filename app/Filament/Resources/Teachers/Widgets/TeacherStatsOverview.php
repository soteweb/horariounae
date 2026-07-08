<?php

namespace App\Filament\Resources\Teachers\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TeacherStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $total = \App\Models\Teacher::count();
        $activos = \App\Models\Teacher::where('status', 'activo')->count();
        
        return [
            Stat::make('Total de Docentes', $total)
                ->description('+ 12%')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('warning'),
            Stat::make('Docentes Activos', $activos)
                ->description(round(($activos / max($total, 1)) * 100) . '% de la plantilla actual')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success'),
            Stat::make('Carga Horaria Promedio', '24h / semanales')
                ->description('Estable')
                ->descriptionIcon('heroicon-m-clock')
                ->color('gray'),
        ];
    }
}
