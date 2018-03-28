<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Video;
use App\Models\Category;

class VideosController extends Controller
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

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
            'video_logo' => 'required|mimes:png,jpeg,jpg',
            'video_background' => 'required|mimes:png,jpeg,jpg',
            'video_file' => 'required|mimes:mp4',
            'category' => 'required'
        ]);

        $video_logo = $request->file('video_logo');
        $video_logo_name = $video_logo->store('images/logos');

        $video_background = $request->file('video_background');
        $video_background_name = $video_background->store('images/backgrounds');

        $video_file = $request->file('video_file');
        $video_file_name = $video_file->store('videos');

        Video::create([
            'video_name' => $request['video_name'],
            'description' => $request['video_description'],
            'imdb' => $request['imdb'],
            'age_control' => $request['age_control'],
            'published_date' => $request['published_date'],
            'video_logo' => $video_logo_name,
            'video_background' => $video_background_name,
            'video_file' => $video_file_name,
            'category_id' => $request['category']
        ]);
        session()->flash(
            'message', "You added a video ".$request['video_name']."."
        );

        return redirect('/videos');
    }

    public function show()
    {
        $videos = Video::all();

        return view('videos.all', compact('videos'));
    }

    public function delete(Video $video)
    {
        File::Delete(storage_path('app/' . $video->video_logo));
        File::Delete(storage_path('app/' . $video->video_background));
        File::Delete(storage_path('app/' . $video->video_file));
        $video->delete();

        return redirect('/videos');
    }
}
