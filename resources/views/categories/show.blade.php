@extends ('layouts.master')

@section ('content')

    <div class="container">
        <h2>Category {{ $category->category_name }}</h2>
            <div>
                {{ $category->category_name }} <img src="{{ url($category->category_image) }}" width="100px" height="100px">
                <a href="{{ action('CategoriesController@edit', $category->id) }}"><button class="btn">Edit</button></a>
                <form method="POST" action="{{ action('CategoriesController@destroy', $category->id) }}">
                    <input name="_method" type="hidden" value="DELETE">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
    </div>
@endsection