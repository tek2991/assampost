<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Office extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title', 'address_line1', 'address_line2', 'phone_no', 'email', 'website', 'other_description', 'is_active'];
    
}
