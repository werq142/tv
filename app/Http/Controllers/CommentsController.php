<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Video;

class CommentsController extends Controller
{
    public function store(Video $video)
    {
        $this->validate(request(),['body' => 'required|min:2']);
        $video->addComment(request('body'));

        return back();
    }
}
