<?php

namespace App\Models;

use App\Models\GalleryPicture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory, SoftDeletes;
    protected $with = ['category','galleryPicture'];
    protected $fillable = ['title','category_id', 'picture', 'brief_description', 'description', 'is_active','slug'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function galleryPicture(){
        return $this->hasOne(GalleryPicture::class);
    }
}
