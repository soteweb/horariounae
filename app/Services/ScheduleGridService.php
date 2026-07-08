<?php

namespace App\Services;

class ScheduleGridService
{
    /**
     * Format schedules into a grid structure grouped by day and time slot.
     *
     * @param \Illuminate\Database\Eloquent\Collection|array $schedules
     * @param array $days
     * @param array $timeSlots
     * @return array
     */
    public function formatForGrid($schedules, array $days, array $timeSlots): array
    {
        $grid = [];

        foreach ($timeSlots as $timeKey => $timeLabel) {
            list($start, $end) = explode('-', $timeKey);
            $grid[$timeKey] = [];

            foreach ($days as $day) {
                // Find the schedule for this day and time slot
                $scheduleForCell = $schedules->first(function ($s) use ($day, $start, $end) {
                    return $s->day_of_week === $day &&
                           $s->start_time === $start &&
                           $s->end_time === $end;
                });

                $grid[$timeKey][$day] = $scheduleForCell;
            }
        }

        return $grid;
    }
}
