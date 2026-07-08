<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerTimeSlot extends Model
{
    protected $fillable = ['career_id', 'start_time', 'end_time', 'sort_order'];

    protected $casts = [
        'start_time' => 'string',
        'end_time'   => 'string',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    /**
     * Returns the slot key used to match against fixed slots in blade views.
     * e.g. "18:20:00|19:05:00"
     */
    public function getSlotKeyAttribute(): string
    {
        return $this->start_time . '|' . $this->end_time;
    }

    /**
     * Returns a human-readable label e.g. "18:20 – 19:05"
     */
    public function getLabelAttribute(): string
    {
        return \Carbon\Carbon::parse($this->start_time)->format('H:i')
            . ' – '
            . \Carbon\Carbon::parse($this->end_time)->format('H:i');
    }
}
