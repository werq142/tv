<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Video;

class Category extends Model
{
    protected $fillable = ['category_name', 'category_image'];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
