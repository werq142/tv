<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Category;

class MainController extends Controller
{
    public function index()
    {
        $videos = Video::all();

        return view('index.index', compact('videos'));
    }

    public function showCategory(Category $category)
    {
        return view('index.showCategory', compact('category'));
    }

    public function showVideo(Video $video)
    {
        return view('index.showVideo', compact('video'));
    }

}
