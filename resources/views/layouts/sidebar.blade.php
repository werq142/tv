<div class="col-sm-3 blog-sidebar">
    <div class="sidebar-module">
        <h4>Categories</h4>
        <ol class="list-unstyled">
            @foreach ($categories as $category)
                <li>
                    <a  href="{{ action('MainController@showCategory', $category) }}">
                        {{ $category->category_name }}
                    </a>
                </li>
            @endforeach
        </ol>
    </div>
</div>