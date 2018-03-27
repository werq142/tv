@extends ('layouts.master')

@section ('content')

    <div class="container">
        <h2>All categories</h2>
        @foreach ($videos as $video)
            <div>
                {{ $video->video_name }}

                <a href="/videos/{{ $video->id }}/delete"><button class="btn btn-danger">Delete</button></a>
            </div>
        @endforeach
    </div>
@endsection