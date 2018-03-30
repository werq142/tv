 <div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="/">Home</a>
          <a class="nav-link" href="{{ action('CategoriesController@index') }}">Categories</a>
            <a class="nav-link" href="{{ action('VideosController@index') }}">Videos</a>

          @if (Auth::check())
          	<a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>
          @endif
        </nav>
      </div>
</div>