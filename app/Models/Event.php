<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Event extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['title', 'picture', 'brief_description', 'description', 'is_active','slug'];
}
