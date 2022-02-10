<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Download extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $with = ['category'];
    protected $fillable = ['title','category_id', 'filename', 'file_path'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
