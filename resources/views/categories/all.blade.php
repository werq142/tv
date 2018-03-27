@extends ('layouts.master')

@section ('content')

    <div class="container">
        <h2>All categories</h2>
        @foreach ($categories as $category)
            <div>
                {{ $category->category_name }}
                <a href="/categories/{{ $category->id }}/edit"><button class="btn">Edit</button></a>
                <a href="/categories/{{ $category->id }}/delete"><button class="btn btn-danger">Delete</button></a>
            </div>
        @endforeach
    </div>
@endsection