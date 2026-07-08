<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    protected $fillable = [
        'career_id',
        'course_id',
        'turn_id',
        'teacher_id',
        'subject_id',
        'classroom_id',
        'day_of_week',
        'start_time',
        'end_time',
        'status',
    ];

    public function career(): BelongsTo
    {
        return $this->belongsTo(Career::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function turn(): BelongsTo
    {
        return $this->belongsTo(Turn::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }
}
