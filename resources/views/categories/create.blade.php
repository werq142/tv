@extends ('layouts.master')

@section ('content')

    <div class="col-sm-8 blog-main">
        <h2>Add a category</h2>
        <form method="POST" action="{{ action('CategoriesController@store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="category_name">Category name:</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>

            <div class="form-group">
                <label for="category_image">Category image:</label>
                <input type="file" class="form-control" id="category_image" name="category_image" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

            @include ('layouts.errors')

        </form>

    </div>
@endsection