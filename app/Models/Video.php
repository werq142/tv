<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Video extends Model
{
    protected $fillable = ['video_name', 'category_id', 'description', 'imdb', 'age_control',  'published_date',
        'video_logo', 'video_background', 'video_file'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
