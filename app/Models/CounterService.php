<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CounterService extends Model
{
    protected $fillable = ['name'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
