<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class WeeklySchedule extends Page
{
    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-m-calendar-days';
    }

    public static function getNavigationLabel(): string
    {
        return 'Horario Semanal';
    }

    public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Horario Semanal';
    }

    protected string $view = 'filament.pages.weekly-schedule';

    // Livewire public properties bound directly
    public ?string $career_id = null;
    public ?string $course_id = null;

    // Turno siempre es Noche (id=1)
    protected int $turn_id = 1;

    public function getSchedules()
    {
        $query = \App\Models\Schedule::with(['subject', 'teacher', 'classroom', 'turn'])
            ->where('turn_id', $this->turn_id);

        if ($this->career_id) {
            $query->where('career_id', $this->career_id);
        }
        if ($this->course_id) {
            $query->where('course_id', $this->course_id);
        }

        return $query->orderBy('start_time')->get();
    }

    public function getCareerSlots(): \Illuminate\Support\Collection
    {
        if ($this->career_id) {
            $slots = \App\Models\CareerTimeSlot::where('career_id', $this->career_id)
                ->orderBy('sort_order')
                ->orderBy('start_time')
                ->get();

            if ($slots->isNotEmpty()) {
                return $slots->map(fn($s) => $s->start_time . ' - ' . $s->end_time);
            }
        }

        // Default Noche slots
        return collect([
            '18:20:00 - 19:05:00',
            '19:05:00 - 19:50:00',
            '20:00:00 - 20:45:00',
            '20:45:00 - 21:30:00',
        ]);
    }
}
