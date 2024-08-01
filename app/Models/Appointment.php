<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'date', 'time_slot_id', 'counter_service_id', 'account_number', 'is_existing_customer', 'message', 'status', 'user_id'];

    protected $dates = ['date'];

    protected $casts = [
        'is_existing_customer' => 'boolean',
    ];

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class);
    }

    public function counterService()
    {
        return $this->belongsTo(CounterService::class);
    }
}
