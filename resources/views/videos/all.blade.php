@extends ('layouts.master')

@section ('content')

    <div class="container">
        <h2>All videos</h2>
        @foreach ($videos as $video)
            <div>
                <span>Name: {{ $video->video_name }}</span>
                <span>Description: {{ $video->description }}</span>
                <a href="/videos/{{ $video->id }}/edit"><button class="btn">Edit</button></a>
                <a href="/videos/{{ $video->id }}/delete"><button class="btn btn-danger">Delete</button></a>
                <img src="{{ url($video->video_background) }}" width="400px">
                <video width="400" height="300" controls="controls" poster="{{ url($video->video_background) }}">
                    <source src="{{ url($video->video_file) }}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
                </video>
            </div>
        @endforeach
    </div>
@endsection