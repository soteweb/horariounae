<?php

use Illuminate\Support\Facades\Route;
use App\Models\Career;
use App\Models\Course;
use App\Models\Turn;
use App\Models\Schedule;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    $careers = Career::all();
    $courses = Course::all();
    $turns = Turn::all();
    
    $career_id = $request->input('career_id');
    $course_id = $request->input('course_id');
    $turn_id = $request->input('turn_id');
    
    $schedules = [];
    if ($career_id && $course_id && $turn_id) {
        $schedules = Schedule::with(['subject', 'teacher', 'classroom'])
            ->where('career_id', $career_id)
            ->where('course_id', $course_id)
            ->where('turn_id', $turn_id)
            ->get();
    }
    
    return view('schedule', compact('careers', 'courses', 'turns', 'schedules', 'career_id', 'course_id', 'turn_id'));
});

Route::get('/salas', function () {
    $schedules = Schedule::with(['subject', 'teacher', 'classroom'])->get();
    return view('classrooms', compact('schedules'));
});
