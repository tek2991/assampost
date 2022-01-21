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
    protected $fillable = ['office_id','title', 'address_line1', 'address_line2', 'phone_no', 'email', 'website', 'other_description', 'is_active'];
    public function office(){
        return $this->belongsTo('App\Models\Office');
    }
}
