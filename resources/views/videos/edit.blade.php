@extends ('layouts.master')

@section ('content')

    <div class="container">
        <h2>Edit {{ $video->video_name }}</h2>
        <form method="POST" action="/videos/{{ $video->id }}/save" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="video_name">Video title:</label>
                <input type="text" class="form-control" id="video_name" name="video_name" value="{{ $video->video_name }}">
            </div>

            <div class="form-group">
                <label for="video_description">Video description:</label>
                <input type="text" class="form-control" id="video_description" name="video_description" value="{{ $video->description }}">
            </div>

            <div class="form-group">
                <label for="imdb">IMDb link:</label>
                <input type="text" class="form-control" id="imdb" name="imdb" value="{{ $video->imdb }}">
            </div>

            <div class="form-group">
                <label for="age_control">Age control:</label>
                <input type="text" class="form-control" id="age_control" name="age_control" value="{{ $video->age_control }}">
            </div>

            <div class="form-group">
                <label for="published_date">Published Date:</label>
                <input type="text" class="form-control" id="published_date" name="published_date" value="{{ $video->published_date }}">
            </div>

            <div class="form-group">
                <label for="video_logo">Video logo:</label>
                <input type="file" class="form-control" id="video_logo" name="video_logo">
            </div>

            <div class="form-group">
                <label for="video_background">Video background:</label>
                <input type="file" class="form-control" id="video_background" name="video_background">
            </div>

            <div class="form-group">
                <label for="video_file">Video file:</label>
                <input type="file" class="form-control" id="video_file" name="video_file">
            </div>

            <div class="form-group">
                <label for="category_id">Select category:</label>
                <select class="select" name="category">
                    @foreach ($categories as $category)
                        @if ($video->category_id == $category->id)
                            <option value="{{  $category->id }}" selected="selected">{{ $category->category_name }}</option>
                        @else
                            <option value="{{  $category->id }}">{{ $category->category_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

            @include ('layouts.errors')

        </form>

    </div>
@endsection