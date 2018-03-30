@extends ('layouts.master')

@section ('content')

    <div class="container">
        <h2>Category {{ $category->category_name }}</h2>
            <div>
                {{ $category->category_name }} <img src="{{ url($category->category_image) }}" width="100px" height="100px">
                <a href="/dashboard/categories/{{ $category->id }}/edit"><button class="btn">Edit</button></a>
                <a href="/dashboard/categories/{{ $category->id }}/delete"><button class="btn btn-danger">Delete</button></a>
            </div>
    </div>
@endsection