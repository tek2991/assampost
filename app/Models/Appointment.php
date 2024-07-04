<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'date', 'time_slot_id', 'counter_service_id', 'message'];

    protected $dates = ['date'];

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class);
    }

    public function counterService()
    {
        return $this->belongsTo(CounterService::class);
    }
}
