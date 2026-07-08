<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'period', 'identifier', 'career_id', 'start_date', 'end_date', 'status'];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
