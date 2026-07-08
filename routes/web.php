<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicScheduleController;

Route::get('/', [PublicScheduleController::class, 'schedule'])->name('public.schedule');
Route::get('/salas', [PublicScheduleController::class, 'classrooms'])->name('public.classrooms');
