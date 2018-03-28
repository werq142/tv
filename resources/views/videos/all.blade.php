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
                <img src="{{ $video->video_background }}" width="400px">
            <!--<video width="400" height="300" controls="controls" poster="/storage/app/$video->video_background ">
                    <source src="/storage/app/ $video->video_background " type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                    <source src="video/duel.ogv" type='video/ogg; codecs="theora, vorbis"'>
                    <source src="video/duel.webm" type='video/webm; codecs="vp8, vorbis"'>
                </video>-->
            </div>
        @endforeach
    </div>
@endsection