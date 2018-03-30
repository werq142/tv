@extends ('layouts.master')

@section ('content')

    <div class="container">
        <h2>All categories</h2>
        <a href="{{ action('CategoriesController@create') }}"><button class="btn btn-success">Add category</button></a>
        @foreach ($categories as $category)
            <div>
                {{ $category->category_name }} <img src="{{ url($category->category_image) }}" width="100px" height="100px">
                <a href="{{ action('CategoriesController@edit', $category->id) }}"><button class="btn">Edit</button></a>
                <a href="{{ action('CategoriesController@destroy', $category->id) }}"><button class="btn btn-danger">Delete</button></a>
            </div>
        @endforeach
    </div>
@endsection