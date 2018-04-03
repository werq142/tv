@extends ('layouts.master')

@section ('content')

    <div class="col-sm-8 blog-main">
        <h2>Video {{ $video->video_name }}</h2>
            <div class="video">
                <span>{{ $video->description }}</span>
                <a href="{{ action('VideosController@edit', $video->id) }}"><button class="btn">Edit</button></a>
                <form method="POST" action="{{ action('VideosController@destroy', $video->id) }}">
                    <input name="_method" type="hidden" value="DELETE">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <br>
                <img src="{{ url($video->video_logo) }}">
                <video width="400" height="300" controls="controls" poster="{{ url($video->video_background) }}">
                    <source src="{{ url($video->video_file) }}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
                </video>
            </div>
    </div>
@endsection