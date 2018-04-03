<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Comment;

class Video extends Model
{
    protected $fillable = ['video_name', 'category_id', 'description', 'imdb', 'age_control',  'published_date',
        'video_logo', 'video_background', 'video_file'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
        $user_id = auth()->user()->id;

        Comment::create([
        'body' => $body,
        'video_id' => $this->id,
        'user_id' => $user_id
        ]);
    }
}
