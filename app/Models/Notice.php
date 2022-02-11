<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Notice extends Model
{
    use HasFactory, SoftDeletes;
    protected $with = ['category'];
    protected $fillable = ['title', 'filename', 'file_path','publish_to_scroll', 'date', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
