@extends ('layouts.master')

@section ('content')

    <div class="col-sm-8 blog-main">
        <h2>Dashboard</h2>
        <a class="nav-link" href="{{ action('CategoriesController@index') }}">Categories</a>
        <a class="nav-link" href="{{ action('VideosController@index') }}">Videos</a>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <h4>{{ $amount['users'] }}</h4>
                <h4>Users</h4>
                <p>The total amount of users on your site</p>
            </div>
            <div class="col-sm-4">
                <h4>{{ $amount['videos'] }}</h4>
                <h4>Videos</h4>
                <p>The total amount of videos on your site</p>
            </div>
            <div class="col-sm-4">
                <h4>{{ $amount['categories'] }}</h4>
                <h4>Categories</h4>
                <p>The total amount of categories on your site</p>
            </div>
        </div>
        <div>
            <h4>Settings</h4>
            <p>Registration:

            @if($settings->registration)
                    <strong> On </strong>
            @else
                    <strong> Off </strong>
            @endif

            </p>
            <a href="{{ action('AdminController@controlRegistration') }}"><button class="btn btn-danger">On/Off registration</button></a>
            <form method="POST" action="{{ action('AdminController@addIp') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="ip">Ip:</label>
                    <input type="text" class="form-control" id="ip" name="ip" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

                @include ('layouts.errors')

            </form>
        </div>
    </div>
@endsection