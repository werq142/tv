<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="/">Home</a>

            @if (Auth::check())
                @if (Auth::user()->is_admin)
                    <a class="nav-link" href="{{ action('AdminController@dashboard') }}">Dashboard</a>
                @endif
                <a class="nav-link ml-auto"
                   href="{{ action('UsersController@show', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
            @else
                <a class="nav-link ml-auto" href="{{ action('UsersController@create') }}">Register</a>
                <a class="nav-link ml-auto" href="{{ action('SessionsController@create') }}">Login</a>
            @endif
        </nav>
    </div>
</div>