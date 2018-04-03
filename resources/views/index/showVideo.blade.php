@extends ('layouts.master')

@section ('content')

    <div class="col-sm-8 blog-main">
        <h2>Video {{ $video->video_name }}</h2>
        <br>
        <h4>Video's category: {{ $video->category->category_name }}</h4>
        <hr>
            <div class="video">
                <span>{{ $video->description }}</span>
                <hr>
                <img src="{{ url($video->video_logo) }}">
                <video width="400" height="300" controls="controls" poster="{{ url($video->video_background) }}">
                    <source src="{{ url($video->video_file) }}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
                </video>
            </div>
        <hr>

        <div class="comments">
            <ul class="list-group">
                @foreach ($video->comments as $comment)
                    <article>
                        <li class="list-group-item">
                            <strong>
                                {{ $comment->created_at->diffForHumans() }} by {{ $comment->user->name }}: &nbsp;
                            </strong>
                            {{ $comment->body }}
                        </li>
                    </article>
                @endforeach
            </ul>
        </div>

        <hr>
        @if (Auth::check())
            <div class="card">
                <div class="card-block">
                    <div class="container">
                        <form method="POST" action="/videos/{{ $video->id }}/comments">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <textarea name="body" placeholder="Your comment here." class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add comment</button>
                            </div>
                        </form>

                        @include('layouts.errors')
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection