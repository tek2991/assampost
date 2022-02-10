<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $with = ['category'];
    protected $fillable = ['title','category_id', 'url'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
