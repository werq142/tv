<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Video;
use App\Models\Category;

class VideosController extends Controller
{
    public function add()
    {
        $categories = Category::all();
        return view('videos.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'video_name' => 'required|max:32',
            'video_description' => 'required',
            'imdb' => 'required',
            'age_control' => 'required',
            'published_date' => 'required',
            'video_logo' => 'required',
            'video_background' => 'required',
            'video_file' => 'required|mimes:mp4',
            'select' => 'required'
        ]);
        $video_file = $request->file('video_file');
        $video_file_name = $video_file->store('videos');
        Video::create([
            'video_name' => $request['video_name'],
            'video_description' => $request['video_name'],
            'imdb' => $request['imdb'],
            'age_control' => $request['age_control'],
            'published_date' => $request['published_date'],
            'video_logo' => $request['video_logo'],
            'video_background' => $request['video_background'],
            'video_file' => $video_file_name,
            'category_id' => $request['select']
        ]);
        session()->flash(
            'message', "You added a video ".$request['video_name']."."
        );

        return redirect('/video');
    }

    public function show()
    {
        $videos = Video::all();

        return view('videos.all', compact('videos'));
    }

    public function delete(Video $video)
    {
        File::Delete(storage_path('app/' . $video->video_file));
        $video->delete();

        return redirect('/categories');
    }
}
