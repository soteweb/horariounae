<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'hours', 'description', 'identifier', 'modality', 'faculty', 'type', 'status'];
}
