@extends ('layouts.master')

@section ('content')

    <div class="container">
        <h2>Add a video</h2>
        <form method="POST" action="/videos/store" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="video_name">Video title:</label>
                <input type="text" class="form-control" id="video_name" name="video_name" required>
            </div>

            <div class="form-group">
                <label for="video_description">Video description:</label>
                <input type="text" class="form-control" id="video_description" name="video_description" required>
            </div>

            <div class="form-group">
                <label for="imdb">IMDb link:</label>
                <input type="text" class="form-control" id="imdb" name="imdb" required>
            </div>

            <div class="form-group">
                <label for="age_control">Age control:</label>
                <input type="text" class="form-control" id="age_control" name="age_control" required>
            </div>

            <div class="form-group">
                <label for="published_date">Published Date:</label>
                <input type="text" class="form-control" id="published_date" name="published_date" required>
            </div>

            <div class="form-group">
                <label for="video_logo">Video logo:</label>
                <input type="file" class="form-control" id="video_logo" name="video_logo" required>
            </div>

            <div class="form-group">
                <label for="video_background">Video background:</label>
                <input type="file" class="form-control" id="video_background" name="video_background" required>
            </div>

            <div class="form-group">
                <label for="video_file">Video file:</label>
                <input type="file" class="form-control" id="video_file" name="video_file" required>
            </div>

            <div class="form-group">
                <label for="category_id">Select category:</label>
                <select class="select" style="width: 300px;" name="select">
                    <option>1</option>
                    @foreach ($categories as $category)
                        <option>{{ $category->categoty_name }}</option>
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