<?php

namespace App\Filament\Resources\Careers\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CareerStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Métricas de red', \App\Models\Career::count())
                ->description('Total Carreras')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('warning'), // The screenshot showed a dark card with yellow, this is a decent approximation for Filament's standard colors
        ];
    }
}
