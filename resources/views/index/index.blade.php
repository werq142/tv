@extends ('layouts.master')

@section ('content')

        <div class="col-sm-8 blog-main">
            <h2>All videos</h2>
            @foreach ($videos as $video)
                <div class="video">
                    <span>Name: {{ $video->video_name }}</span>
                    <span>Description: {{ $video->description }}</span>
                    <a href="{{ action('MainController@showVideo', $video) }}"><button class="btn">Show this video</button></a>
                    <br>
                    <img src="{{ url($video->video_logo) }}">
                    <video width="400" height="300" controls="controls" poster="{{ url($video->video_background) }}">
                        <source src="{{ url($video->video_file) }}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
                    </video>
                </div>
            @endforeach
        </div>

@endsection