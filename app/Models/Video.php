<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['video_name', 'category_id', ['description'], ['imdb'], ['age_control'],  ['published_date'],
        ['video_logo'], ['video_background'], ['video_file']];
}
