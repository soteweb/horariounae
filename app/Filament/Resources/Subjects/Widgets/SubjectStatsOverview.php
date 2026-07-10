<?php

namespace App\Filament\Resources\Subjects\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SubjectStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total de Materias', \App\Models\Subject::count())
                ->description('+4 este mes')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('success'),
            Stat::make('Materias Electivas', \App\Models\Subject::where('type', 'Electiva')->count())
                ->description('8% del total')
                ->descriptionIcon('heroicon-m-list-bullet')
                ->color('primary'),
        ];
    }
}
