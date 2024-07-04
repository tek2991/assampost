<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    protected $fillable = ['time', 'is_functional'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
