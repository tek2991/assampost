<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class GalleryPicture extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected  $fillable = ['event_id','file_path'];
}
