@extends ('layouts.master')

@section ('content')

    <div class="container">
        <h2>All videos</h2>
        @foreach ($videos as $video)
            <div>
                <span>Name: {{ $video->video_name }}</span>
                <span>Description: {{ $video->description }}</span>

                <a href="/videos/{{ $video->id }}/delete"><button class="btn btn-danger">Delete</button></a>
            </div>
        @endforeach
    </div>
@endsection