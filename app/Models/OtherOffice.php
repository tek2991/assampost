<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OtherOffice extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $with = ['office'];
    protected $fillable = ['office_id','title', 'address_line1', 'address_line2', 'phone_no', 'email', 'website', 'other_description', 'is_active', 'division_id', 'district_id'];

    public function office(){
        return $this->belongsTo(Office::class);
    }

    public function division(){
        return $this->belongsTo(Division::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }
}
