<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Turn;
use App\Services\ScheduleGridService;
use Illuminate\Http\Request;

class PublicScheduleController extends Controller
{
    protected $scheduleGridService;

    public function __construct(ScheduleGridService $scheduleGridService)
    {
        $this->scheduleGridService = $scheduleGridService;
    }

    public function schedule(Request $request)
    {
        $careers = Career::select('id', 'name')->get();
        $courses = Course::select('id', 'name')->get();
        $turns = Turn::select('id', 'name')->get();

        $career_id = $request->input('career_id');
        $course_id = $request->input('course_id');
        $turn_id = $request->input('turn_id');

        $schedules = collect();
        $grid = [];
        $timeSlots = [];
        $subjectsSummary = [];
        $facultyName = 'SELECCIONE UNA CARRERA';
        $careerName = '';

        $days = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];

        if ($career_id && $course_id && $turn_id) {
            $career = Career::with(['faculty', 'timeSlots'])->find($career_id);
            if ($career) {
                $facultyName = $career->faculty ? mb_strtoupper($career->faculty->name) : 'CARRERA SIN FACULTAD';
                $careerName = $career->name;
                
                foreach ($career->timeSlots as $slot) {
                    $key = $slot->start_time . '-' . $slot->end_time;
                    $timeSlots[$key] = $slot->label;
                }
            }

            $schedules = Schedule::with(['subject', 'teacher', 'classroom'])
                ->where('career_id', $career_id)
                ->where('course_id', $course_id)
                ->where('turn_id', $turn_id)
                ->get();
            
            if (empty($timeSlots)) {
                $timeSlots = [
                    '18:20:00-19:05:00' => '18:20-19:05',
                    '19:05:00-19:50:00' => '19:05-19:50',
                    '20:00:00-20:45:00' => '20:00-20:45',
                    '20:45:00-21:30:00' => '20:45-21:30'
                ];
            }
            
            $grid = $this->scheduleGridService->formatForGrid($schedules, $days, $timeSlots);

            foreach ($schedules as $sch) {
                if ($sch->subject) {
                    if (!isset($subjectsSummary[$sch->subject_id])) {
                        $subjectsSummary[$sch->subject_id] = [
                            'identifier' => $sch->subject->identifier,
                            'name' => $sch->subject->name,
                            'hours' => 0
                        ];
                    }
                    $subjectsSummary[$sch->subject_id]['hours'] += 1;
                }
            }
        }

        return view('schedule', compact(
            'careers',
            'courses',
            'turns',
            'grid',
            'career_id',
            'course_id',
            'turn_id',
            'timeSlots',
            'days',
            'facultyName',
            'careerName',
            'subjectsSummary'
        ));
    }

    public function classrooms(Request $request)
    {
        $schedules = Schedule::with(['subject', 'teacher', 'classroom'])->paginate(10);
        return view('classrooms', compact('schedules'));
    }
}
