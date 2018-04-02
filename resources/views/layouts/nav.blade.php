<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="/">Home</a>
            <a class="nav-link" href="{{ action('CategoriesController@index') }}">Categories</a>
            <a class="nav-link" href="{{ action('VideosController@index') }}">Videos</a>

            @if (Auth::check())
                <a class="nav-link ml-auto"
                   href="{{ action('UsersController@show', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
            @else
                <a class="nav-link ml-auto" href="{{ action('UsersController@create') }}">Register</a>
                <a class="nav-link ml-auto" href="{{ action('SessionsController@create') }}">Login</a>
            @endif
        </nav>
    </div>
</div>