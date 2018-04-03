<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Video;
use App\Models\Category;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();

        return view('videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('videos.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
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
        $video_logo_name = uniqid();
        $video_logo_name = $video_logo_name . '.png';
        $video_logo->move(public_path() . '/images/logos', $video_logo_name);
        $video_logo_name = 'images/logos/' . $video_logo_name;

        $video_background = $request->file('video_background');
        $video_background_name = uniqid();
        $video_background_name = $video_background_name . '.png';
        $video_background->move(public_path() . '/images/backgrounds', $video_background_name);
        $video_background_name = 'images/backgrounds/' . $video_background_name;

        $video_file = $request->file('video_file');
        $video_file_name = uniqid();
        $video_file_name = $video_file_name . '.mp4';
        $video_file->move(public_path() . '/all_videos', $video_file_name);
        $video_file_name = 'all_videos/' . $video_file_name;

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
            'message', "You added a video " . $request['video_name'] . "."
        );

        return redirect()->action('VideosController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);

        return view('videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        $categories = Category::all();

        return view('videos.edit', compact('video', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = Video::find($id);

        $this->validate(request(), [
            'video_name' => 'required|max:32',
            'video_description' => 'required',
            'imdb' => 'required',
            'age_control' => 'required',
            'published_date' => 'required',
            'video_logo' => 'mimes:png,jpeg,jpg',
            'video_background' => 'mimes:png,jpeg,jpg',
            'video_file' => 'mimes:mp4',
            'category' => 'required'
        ]);

        $video->video_name = $request['video_name'];
        $video->description = $request['video_description'];
        $video->imdb = $request['imdb'];
        $video->age_control = $request['age_control'];
        $video->published_date = $request['published_date'];

        if ($request['video_logo']) {
            File::Delete(public_path($video->video_logo));
            $video_logo = $request->file('video_logo');
            $video_logo_name = uniqid();
            $video_logo_name = $video_logo_name . '.png';
            $video_logo->move(public_path() . '/images/logos', $video_logo_name);
            $video_logo_name = 'images/logos/' . $video_logo_name;
            $video->video_logo = $video_logo_name;
        }

        if ($request['video_background']) {
            File::Delete(public_path($video->video_background));
            $video_background = $request->file('video_background');
            $video_background_name = uniqid();
            $video_background_name = $video_background_name . '.png';
            $video_background->move(public_path() . '/images/logos', $video_background_name);
            $video_background_name = 'images/logos/' . $video_background_name;
            $video->video_background = $video_background_name;
        }

        if ($request['video_file']) {
            File::Delete(public_path($video->video_file));
            $video_file = $request->file('video_file');
            $video_file_name = uniqid();
            $video_file_name = $video_file_name . '.mp4';
            $video_file->move(public_path() . '/all_videos', $video_file_name);
            $video_file_name = 'all_videos/' . $video_file_name;
            $video->video_file = $video_file_name;
        }

        $video->save();

        return redirect()->action('VideosController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);

        File::Delete(storage_path('app/' . $video->video_logo));
        File::Delete(storage_path('app/' . $video->video_background));
        File::Delete(storage_path('app/' . $video->video_file));

        $video->delete();

        return redirect()->action('VideosController@index');
    }
}
