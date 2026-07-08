<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = ['name', 'identifier', 'description', 'faculty_id', 'duration'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function timeSlots()
    {
        return $this->hasMany(CareerTimeSlot::class)->orderBy('sort_order')->orderBy('start_time');
    }
}
