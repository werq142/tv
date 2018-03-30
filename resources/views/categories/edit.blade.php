@extends ('layouts.master')

@section ('content')

    <div class="container">
        <h2>Edit {{ $category->category_name }}</h2>
        <form method="POST" action="{{ action( 'CategoriesController@update', $category->id) }}" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="category_name">Category name:</label>
                <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->category_name }}">
            </div>

            <div class="form-group">
                <label for="category_image">Category image:</label>
                <input type="file" class="form-control" id="category_image" name="category_image">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

            @include ('layouts.errors')

        </form>

    </div>
@endsection